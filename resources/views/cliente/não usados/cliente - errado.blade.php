@extends('principal')
@section('conteudo')
<section id='clibase'>
    @yield('clibase')
        <script type="text/javascript">
            function novo()
            {
                location.href='/cliente_novo';
            }
        </script>
		
    <div class="container">
        <h2>Cadastro - Clientes</h2>
        <!--<form id="cadastro1" novalidate="novalidate"> -->
        <form method="get" action="/cliente_busca">
            
        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
				<label class="control-label" for="id">Código</label>
				<input type="text" class="form-control" id="id" placeholder="Código Cliente" name="id">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_nome">Nome</label>
                                <input type="text" class="form-control" id="cli_nome" name="cli_nome" placeholder="Nome do Cliente">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="fj1">Tipo de usuário (Fisico/Juridico)</label>
                                    <select id="cli_tipo" class="form-control" name="cli_tipo">
                                        <option value="">Selecione</option>
                                        <option value="1">Fisico</option>
                                        <option value="2">Juridico</option>
                                    </select>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- essa tag quebra a linha, manda os campos para baixo, ajuda a acertar o form
                    <div class="row">                        
                        
                    </div>
                    -->
                                   
                    <input type='submit' class="btn btn btn-success" value='Buscar'/>
                    <input type="button" class="btn btn-primary" value='Novo Cliente'onclick="novo()">
		</div>		
            </div>
        </div>
    
        </form>
    </div>

</section>
@stop

