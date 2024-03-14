<a href="#" data-toggle="modal" class="btn btn-danger btn-xs" data-target="#confirmDelete-{{ $id }}">
    <span data-toggle="tooltip" data-placement="left" title="Delete {{ $title }}"
        class="fa fa-trash" aria-hidden="true"></span>
</a>
<div class="modal fade" id="confirmDelete-{{ $id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal-{{ $id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-danger">
                <h3 class="modal-title"><span class="fa fa-question-circle" aria-hidden="true"></span> Are
                    you sure want to delete?</h3>

            </div>
            <div class="modal-body">
                <p>All the data related to <b>{{ $title }}</b> will be deleted permanently!</p>

            </div>
            <div class="modal-footer">
                <form class="form-horizontal" role="form" method="POST"
                    action="{{ $route }}">
                    @csrf
                    @method('DELETE')
                    <input value="DELETE" type="submit" class="btn btn-danger"
                        onclick="this.disabled=true;this.value='Deleting...';this.form.submit();">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                </form>
            </div>
        </div>
    </div>
</div>
