<div>
    <div class="modal fade" id="admin-create-post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Craete new post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form wire:submit="submit">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input wire:model="title" type="text" class="form-control" id="title"
                                    placeholder="Enter title">
                                @error('title')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea wire:model="description" class="form-control" id="description" placeholder="Description"></textarea>
                                @error('description')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input wire:model.defer="image" class="form-control" type="file">
                                @error('image')
                                    <span style="color: red" class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- /.card-body -->


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
