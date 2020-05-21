<div class="form-row ">
    <div class="form-group col-md-5">
        <label for="titulo">TITULO</label>
        <input 
            type="text" class="form-control" name="titulo" placeholder="Digite o titulo do produto" required
            value="{{isset($produtos->titulo) ? $produtos->titulo : ''}}"
        >
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="descricao">DESCRIÇÃO</label>
        <input 
            type="text" class="form-control" name="descricao" placeholder="Digite a descrição do produto" required
            value="{{isset($produtos->descricao) ? $produtos->descricao : ''}}"
        >
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5 mb-4">
        <label for="valor">VALOR</label>
        <input 
            type="text" class="form-control" name="valor" placeholder="Digite o valor do produto" required
            value="{{isset($produtos->valor) ? $produtos->valor : ''}}"
        >
    </div>
</div>

<div class="form-row">                        
    <div class="file-input input-group col-md-5 mb-4">                            
        <label class="custom-file-label" for="imagem">IMAGEM</label>                          
        <input type="file" class="custom-file-input" name="imagem" >                            
    </div>    
</div>
