<div class="row section">
	<h3 align="center">Imóveis</h3>
	<div class="divider"></div>
	<br>
	@include('layouts._site._filtros')
</div>



@foreach($imoveis as $imovel)

<div class="row section">

	<div class="col s12 m3"> <!--s12 define tela cheia dispositivo moveis m3 menor para desktop -->
		<div class="card">
			<div class="card-image">
				<a href="{{ route('site.imovel',[$imovel->id,$imovel->getSlug()]) }}"><img src="{{ asset ($imovel->imagem)}}" alt="{{ $imovel->titulo }}"></a>
			</div>
			<div class="card-content">
				<p><b class="deep-orange-text darken-1">{{ $imovel->status }}</b></p>
				<p><b>{{ $imovel->titulo }}</b></p>
				<p>{{ $imovel->descricao }}</p>
				<p>R${{ number_format($imovel->valor,2,",",".") }}</p>
			</div>
			<div class="card-action">
				
				<a href="{{ route('site.imovel',[$imovel->id, $imovel->getSlug()]) }}">Ver mais...</a>
			</div>
		</div>
	</div>

@endforeach



</div>

@if($paginacao)
	<div align="center" class="row">
		{{ $imoveis->links() }} <!--faz a paginacao quando no controler tem metodo paginate-->>
	</div>
@endif	