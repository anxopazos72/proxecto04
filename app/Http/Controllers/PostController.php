<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Feeds;
use App\Comentario;


class PostController extends Controller
{
    public function getIndex() {
		//Recupera los posts de la base de datos
        $posts = DB::table('users')->join('posts', 'users.id', '=', 'posts.autor')->where('posts.deleted_at', NULL)->orderBy('posts.id', 'DESC')->paginate(4);
        $comentarios = DB::table('comentarios')->where('aprobado', 'Sí')->orderBy('id', 'DESC')->get();
		
		//Enlaza feeds de blogs amigos
		$feed = Feeds::make(['http://www.archicompostela.es/feed', 
		'http://elcientoporuno.blogspot.com/feeds/posts/default', 
		'http://sanfranciscoxavier.com/parroquia/feed/',
		'http://parroquiadepadron.blogspot.com/feeds/posts/default', 
		'https://xanostesaqui.blogspot.com/feeds/posts/default',
		'https://parroquiasdemera.wordpress.com/feed',
		'https://sanjorgedemogor.wordpress.com/feed'], 
		1);

        $data = array(
            'posts' => $posts,
            'comentarios' => $comentarios,
			'title'     => $feed->get_title(),
		    'permalink' => $feed->get_permalink(),
		    'items'     => $feed->get_items(),
        );
		
        return view('front/index', $data);
    }

    public function verPostEntero($post_id) {
		//Para ver el todo el contenido del post
        $post = DB::table('users')->leftjoin('posts', 'users.id', '=', 'posts.autor')->where('posts.id', '=', $post_id)->first();
		$comentarios = DB::table('comentarios')->where('post', '=', $post_id)->where('aprobado', '=', 'Sí')->get();
		if($post){
        return view('front/read', ['post' => $post, 'comentarios' => $comentarios]);
		} else {
			return redirect()->route('index');
		}
    }
	
	public function verSeccion($id){
		//Para ver posts filtrados por secciones
		$seccion = DB::table('users')->leftjoin('posts', 'users.id', '=', 'posts.autor')->where('seccion', '=', $id)->where('posts.deleted_at', NULL)->orderBy('posts.id', 'DESC')->paginate(4);
		return view('front/seccion', ['seccion' => $seccion]);	
	}
	
	public function buscar(Request $request){
		//Hace búsquedas desde frontend
		$request->validate([
			'busca' => 'required',
		]);
		$busca = $request->input('busca');
		$resultado = DB::table('posts')->where('descripcion','LIKE','%'.$busca.'%')->orWhere('titulo','LIKE','%'.$busca.'%')->get();
		if(count($resultado) > 0)
			return view('front/search', ['resultado' => $resultado, 'busca' => $busca]);
		else
			return view('front/search', ['busca' => $busca]);
	}
	
	public function crearComentario(Request $request){
		//Crea los comentarios desde el frontend
		$messages = [
			'nombre.required' => 'El campo nombre es obligatorio',
			'email.required'  => 'El campo email es obligatorio',
		];
		$request->validate([
			'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
		], $messages);
        $comentario = Comentario::create(array(
            'nombre' => Input::get('nombre'),
            'email' => Input::get('email'),
			'texto_comentario' => Input::get('comentario'),
            'post' => Input::get('post_id'),
        ));
        return redirect()->route('post.leer', ['post_id' => $request->post_id])->with('success', 'El comentario ha sido enviado');
    }
	public function verGaleria($id){
		//Visualiza las imágenes de la galería con Magnific Popup
		$titulo="";
		$id=intval($id);
		if($id==1){
			$titulo="Vigilia Pascual";
		}
		if($id==2){
			$titulo="Fiesta de san Blas";
		}
		if($id==3){
			$titulo="Fiesta de san Andrés";
		}
		if($id==4){
			$titulo="Procesión del santo Encuentro";
		}
		if($id>0 && $id<5) {
			return view('front/galeria', ['id' => $id, 'titulo' => $titulo]);	
		}
		else {
			return redirect()->route('index');
		}
	}
}