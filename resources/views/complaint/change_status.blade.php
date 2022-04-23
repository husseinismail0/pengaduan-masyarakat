<div id="modal-status" class="modal" tabindex="-1">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Ganti Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" method="post">
            @csrf
            @method('PATCH')
            <select id="status" name="status">
            @foreach(config('constant.complaint.status') as $status)
                <option value="{{$status}}">{{$status}}</option>
            @endforeach
            </select>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Ganti</button>
        </div>
    </div>
    </div>
</div>