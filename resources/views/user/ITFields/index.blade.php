@extends('user/master')

@section('content')
<style type="text/css">
/*body {
  font: 600 14px/24px "Open Sans", "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", Sans-Serif;
  margin: 12px 0;
}*/
.card-container {
  cursor: pointer;
  height: 200px;
  perspective: 600;
  position: relative;
  width: 100%;
  margin-bottom: 10px;
}
.card {
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
  transition: all 1s ease-in-out;
  width: 100%;
}
.card:hover {
  transform: rotateY(180deg);
}
.card .side {
  backface-visibility: hidden;
  border: 1px solid #efefef;
  border-radius: 6px;
  height: 100%;
  position: absolute;
  overflow: hidden;
  width: 100%;
}
.card .back {
  background: #efefef;
  color: black;
  line-height: 150px;
  text-align: center;
  transform: rotateY(180deg);
}
</style>
<div class="container">

<!--   <div class="row form-group">

    <div class="col-md-5" id="counter"><h1> Viewing {{$count}} results matching</h1></div>
    
  </div> -->


  <div class="col-md-12" style="border-bottom: 1px solid #efefef; margin-bottom: 15px;"></div>
  <div class="col-md-12">

    @foreach ($itField as $it)
    <div class="col-md-3 col-xs-12">
      <div class="card-container">
        <div class="card">
          <div class="side">
            <h3 align="center">{{ $it["Category"] }}</h3>
          </div>
          <div class="side back">
            <p>{{ $it["Feutures"]}}</p>
          </div>
        </div>
      </div>
    </div>

    @endforeach

  </div>
</div>
@endsection
@section('js')
<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
<script type="text/javascript">
  var node = document.getElementById("IT_Field");
  node.setAttribute("class", "active");
</script>
@endsection