<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Handleplan</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Luk</button>
     
      </div>
    </div>
  </div>
</div>
@section('pagescript')
<script>
    $(function() {
$('#myModal').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget) // Button that triggered the modal
  var loadurl = button.data('load-url')

    $(this).find('.modal-body').load(loadurl);
});
    });
</script>
@stop