<!-- modal large -->
<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if ($isForm)
                <form id="frm{{$id}}" method="{{$formMethod}}" class="form-horizontal">
            @endif
            
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">{{$header}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{$slot}}
                </div>
                <div class="modal-footer">
                    {{$buttons}}
                </div>
                
            @if ($isForm)
                </form>
            @endif
        </div>
    </div>
</div>
<!-- end modal large -->