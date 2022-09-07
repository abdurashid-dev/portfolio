<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create skill</h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <form action="{{route('admin.skills.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="skillInput" class="form-label">Skill</label>
                        <input type="text" class="form-control" id="skillInput" name="title">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
