@extends('principal')
@section('conteudo')
<script type="text/javascript">
    var popup;
    function SelectName()
    {
        popup = window.open("busca_cli", "Popup", "width=800,height=600");
        popup.focus();
    }

</script>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <div class="well">
                <form method="post" action="/contrato_adiciona">      
                    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="tipo">Tipo</label>
                                <br>
                                <select class="form-control" name="tipo" id="tipo" >

                                    <option value=""></option>
                                    <option value="1">Rent A Car</option>
                                    <option value="2">Terceirização</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="user_id">Vendedor</label>
                                <select  class="form-control" name="user_id" id="user_id">
                                    <option value=""></option>
                                    @foreach ($usuarios as $b)
                                    <option value="{{$b->id}}">{{$b->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">                                
                                <label class="control-label" for="cliente_id">Código Cliente</label>
                                <input  required type="text" class="form-control" id="cliente_id" name="cliente_id" value="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">                               
                                <label class="control-label" for="cli_nome">Cliente</label>
                                <input  required type="text" class="form-control" id="cli_nome" name="cli_nome" value="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <br>
                                <input type="button" value="Buscar" onclick="SelectName()"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="vigencia">Vigencia</label>
                                <input  required type="date" class="form-control" id="vigencia" name="vigencia" value="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="taxaadmin">Taxa Administrativa</label>
                                <input  required type="text" class="form-control" id="taxaadmin" name="taxaadmin" value="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="taxamulta">Taxa Multa (%)</label>
                                <input  required type="text" class="form-control" id="taxamulta" name="taxamulta" value="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="vencimento">Vencimento</label>
                                <input  required type="text" class="form-control" id="vencimento" name="vencimento" value="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="submit" class="btn btn btn-success" value="Salvar"/>
                            <a href="/contrato"><input class="btn btn-primary" type='button' value='Voltar' /></a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop