{!! Form::open(array('url'=>'Rol','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}


      <form class="search-form" role="search">
        <div class="form-group1 pull-right" id="search">
          <input type="text" class="form-control1" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
          <button type="submit" class="form-control1">Submit</button>
          <span class="search-label"><i class="glyphicon glyphicon-search"></i></span>
        </div>
      </form>
    
<script>
	$(document).ready(function(){
  $('#search').on("click",(function(e){
  $(".form-group1").addClass("sb-search-open");
    e.stopPropagation()
  }));
   $(document).on("click", function(e) {
    if ($(e.target).is("#search") === false && $(".form-control1").val().length == 0) {
      $(".form-group1").removeClass("sb-search-open");
    }
  });
    $(".form-control-submit1").click(function(e){
      $(".form-control1").each(function(){
        if($(".form-control1").val().length == 0){
          e.preventDefault();
          $(this).css('border', '2px solid red');
        }
    })
  })
})
	</script>
{{Form::close()}}