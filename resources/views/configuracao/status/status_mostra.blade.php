@extends('configuracao.status.status')
@section('menuconf')
@stop

@section('stabase')

@stop

@section('mostra')

@if(empty($status))
    <div class="alert alert-danger">Estado não encontrado</div>
@else 



<form method="get" action="/estado_edita">      
<table class="table-responsive table-striped table-bordered table-hover">    
    <tr>
        <td><b>Codigo</b></td>
        <td><b>Nome</b></td>         
    </tr>  
@endif    
    
    <?php foreach ($status as $p): ?>        
        <tr>
        <td><input type="submit" name="id" value="<?= $p->id ?>" readonly="true">  </input> </td>    
        <td><a href="estado_edita/{id}"><?= $p->nome ?></a></td>
        <td><a href="estado_edita/{id}">Editar</a></td>
        <td><a href="estado_edita/<?= $p->id ?>">Editar</a></td>
        <td><a href="estado_edita/{id}">{{ $p->nome }}</a></td>
        <td><a href="estado_edita/{{ $p->id }}">Editar com blade</a></td>
        </tr>   
    <?php    endforeach  ?>   
        
    @foreach ($status as $p)
      <tr>
          <td>{{$p->id}}</td>
          <td>{{$p->nome}}</td>          
      </tr>
    @endforeach
        
</table>
</form>

@stop