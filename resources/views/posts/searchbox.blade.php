<div class="modal fade" tabindex="-1" role="dialog" id="searchmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Søg i indlæg</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="searchform" method="POST" action="{{ url('/clients/'.$client->id.'/posts/search') }}">
           {{ csrf_field() }}
  <div class="form-group">
    <label for="content" class="col-sm-2 control-label">Tekst</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="content" placeholder="fri tekstsøgning" name="content">
    </div>
  </div>
  <div class="form-group">
    <label for="subgoal" class="col-sm-2 control-label">Delmål</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subgoal" name="subgoal" >
    </div>
  </div>
  <div class="form-group">
    <label for="tags" class="col-sm-2 control-label">Emner</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tags" name="tags" >
    </div>
  </div>
    <div class="form-group">
    <label for="tags" class="col-sm-2 control-label">Indlæg fra</label>
    <div class="col-sm-10">
      <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="daterange" id="option1" value="7" autocomplete="off" checked> 1 uge
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="daterange" id="option2" value="21" autocomplete="off"> 3 uger
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="daterange" id="option3" value="90" autocomplete="off"> 3 måneder
  </label>
</div>
    </div>
  </div>
  <center>-------------------------- Eller -------------------------------</center>
  <div class="form-group">
    <label for="tags" class="col-sm-2 control-label">Dato fra</label>
    <div class="col-sm-10">
         <div class="input-group date form_datetime"  id="datetime_from" data-date="" data-date-format="yyyy-mm-dd">
       <input  type="text" class="form-control"  size="16" value="" readonly>
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
        <input id="date_from" type="hidden" class="form-control" name="date_from" size="16" value="" readonly>    

    </div>
  </div>

  <div class="form-group">
    <label for="tags" class="col-sm-2 control-label">Dato til</label>
    <div class="col-sm-10">
      <div class="input-group date form_datetime"  id="datetime_to" data-date="" data-date-format="yyyy-mm-dd">
       <input  type="text" class="form-control"  size="16" value="" readonly>
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
        <input id="date_to" type="hidden" class="form-control" name="date_to" size="16" value="" readonly>    

    </div>
  </div>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuller</button>
        <button type="submit" id="search" class="btn btn-primary">Søg</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@section('pagescript')
    <script>
    function formatDate(d) {

    var dd = d.getDate()
    if (dd < 10) dd = '0' + dd

    var mm = d.getMonth() + 1
    if (mm < 10) mm = '0' + mm

    var yy = d.getFullYear()

    return yy + '-' + mm + '-' + dd
}
    $(function() {
        $('#search').on('click',function(){
     $('#searchform').submit();
 });
        $('#datetime_from').datetimepicker({
    format: 'dd MM yyyy',
    autoclose: true,
    todayBtn: true,
    minView: 2,
    maxView: 2,
    linkField: 'date_from',
    linkFormat: 'yyyy-mm-dd'
});
        $('#datetime_to').datetimepicker({
    format: 'dd MM yyyy',
    autoclose: true,
    todayBtn: true,
    minView: 2,
    maxView: 2,
    linkField: 'date_to',
    linkFormat: 'yyyy-mm-dd'
});
  $('#datetime_from')
.datetimepicker()
.on('changeDate', function(ev){
   var d = new Date(ev.date);
  var newDate = formatDate(d);
  $('#datetime_to').datetimepicker('setStartDate', newDate);   
});
   var $select = $('#tags').selectize({
    plugins: ['remove_button'],    
    valueField: 'id',
    labelField: 'name',
    searchField: ['name'],
     persist: false,
     preload:true,
   openOnFocus: true,
    create: false,
    render: {
        item: function(item, escape) {
							
							return '<div>' +
								'<span class="name">' + item.name + '</span>'  +
							'</div>';
						},
        option: function(item, escape) {
           
            return '<div>' +
                '<span class="title">' +
                    '<span class="name">' + item.name + '</span>' +
                '</span>' +
            '</div>';
        }
    },
    load: function(query, callback) {
       
        $.ajax({
            url: '{{ url('/tags')}}',
            type: 'GET',
            error: function() {
                callback();
            },
            success: function(res) {
                  console.log(res);
                callback(res);
              
            }
        });
    }
});

});
    </script>
@stop