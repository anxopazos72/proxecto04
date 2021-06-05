<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comentario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
		//Despliega un listado de los posts activos en el backend
        $posts = DB::table('users')->join('posts', 'users.id', '=', 'posts.autor')->where('posts.deleted_at', NULL)->orderBy('posts.id', 'DESC')->paginate(5);
        return view('back/home', ['posts' => $posts]);
    }
	
	public function formularioPost() {
		//Visualiza el formulario donde se crean los posts 
        return view('back/post_form');
    }
	
	public function crearPost(Request $request){
		//Crea los posts
        $post = Post::create(array(
            'titulo' => Input::get('titulo'),
            'descripcion' => Input::get('descripcion'),
            'autor' => Auth::user()->id,
			'seccion' => Input::get('seccion')
        ));
        return redirect()->route('home')->with('success', 'El post ha sido creado');
    }
	
	public function verPost($id){
		//Ve el contenido del post entero
        $post = Post::find($id);
        return view('back/post_detail', ['post' => $post]);
    }
	
	public function editarPost($id) {
		//Edita los posts ya creados
        $post = Post::find($id);
        return view('back/edit_post', ['post' => $post]);
    }
	
	public function actualizarPost(Request $request, $id) {
		//Actualiza los posts una vez editados
        $post = Post::find($id);
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
		$post->seccion = $request->seccion;
        $post->save();
        return redirect()->route('home')->with('success', 'El post ha sido actualizado');
    }
	
	public function borrarPost($id) {
		//Hacer un soft delete del post en cuestión
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'El post ha sido enviado a la papelera');
    }
	
	public function verUsuario() {
		//Visualiza la información del usuario logueado desde la opción "Edita usuario"
		$data=array(
			'usuario_id' => Auth::user()->id,
			'name' => Auth::user()->name,
			'email' => Auth::user()->email,
			'password' => Auth::user()->password,
		);
		
        return view('back/user', $data);
    }
	
	public function actualizarUsuario(Request $request, $id) {
		//Actualiza la información del usuario logueado una vez editado
		$request->validate([
			'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
		]);
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
		$usuario->password = Hash::make($request->password);
        $usuario->save();
        return redirect()->route('user')->with('success', 'El usuario ha sido actualizado');
    }
	
	public function verComentarios(){
		//Visualiza en el backend los comentarios enviados por los visitantes 
        $comentarios = DB::table('posts')->join('comentarios', 'comentarios.post', '=', 'posts.id')->orderBy('comentarios.created_at', 'DESC')->paginate(5);
		$posts = DB::table('posts')->get();
        return view('back/comentario', ['comentarios' => $comentarios, 'posts' => $posts]);
    }
	
	public function verComentario($id){
		//Visualiza un comentario concreto para aprobarlo o borrarlo
        $comentario = Comentario::find($id);
        return view('back/comentario_detail', ['comentario' => $comentario]);
    }
	
	public function aprobarComentario($id){
		//Aprueba el comentario en cuestión
		$comentario = Comentario::find($id);
		$comentario->aprobado='Sí';
		$comentario->save();
		return redirect()->route('ver.comentario');
	}
	
	public function borrarComentario($id) {
		//Borra permanentemente el comentario en cuestión
        $comentario = Comentario::find($id);
        $comentario->delete();
        return redirect()->route('ver.comentario');
    }
	
	public function verPapelera(){
		//Visualiza los posts borrados temporalmente (soft delete)
		$papelera= Post::onlyTrashed()->paginate(5);
        return view('back/papelera', ['papelera' => $papelera]);
	}
	
	public function accionPapelera($id){
		//Visualiza un comentario en concreto desde la papelera para después restaurarlo o borrarlo definitivamente 
        $post = Post::withTrashed()->where('id', $id)->first();
        return view('back/borrar_restaurar', ['post' => $post]);
    }
	
	public function restaurarPost($id) {
		//Restaura un comentario desde la papelera
        $post = Post::withTrashed()->where('id', $id)->restore();
		return redirect()->route('home')->with('success', 'El post ha sido restaurado');;
    }
	
	public function borrarPermanente($id) {
		//Borra permanentemente un comentario desde la papelera
        $post = Post::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('home')->with('success', 'El post ha sido borrado permanentemente');
    }	
}
