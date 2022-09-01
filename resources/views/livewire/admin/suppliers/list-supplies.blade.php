<div>
        <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Manage Suppliers</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.listSupplies') }}">Manage Suppliers / All Suppliers</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    
    <div class="card flat-card">
        <div class="d-flex justify-content-end m-2">
                <button wire:click="addNewSupplierModal" style="border-radius: 20px" class="btn btn-primary"> <i class="nav-icon fa fa-plus-circle"></i> Add Supplier</button>
        </div>
    
        <div class="d-flex justify-content-between m-2 align-items-center">
            <div class="px-2">
                <h5>Supplier All Data</h5>
            </div>
    
            <div class="d-flex justify-content-center align-items-center border rounded bg-white ">
                <input wire:model='searchTerm' class="form-control border-0" type="text" placeholder="Search">
                <div wire:loading.delay.longer wire:target="searchTerm">
                    <div style="color: #252428" class="la-ball-clip-rotate la-sm mr-2">
                      <div></div>
                    </div>
                </div>
            </div>
            
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody wire:loading.class="text-muted">
                @forelse ($suppliers as $supplier)
                    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td> <a href="tel:{{ $supplier->telephone }}" class="text-black">{{ '+255 '.substr($supplier->telephone, 1,3). " " . substr($supplier->telephone, 3,3). " " . substr($supplier->telephone, 6) }}</a> </td>
                    <td><a href="mailto:{{ $supplier->email }}" class="text-black">{{ $supplier->email }}</a></td>
                    <td>{{ $supplier->address }}</td>
                    <td>
                        <a wire:click.prevent = "editSupplierForm({{ $supplier }})" href="#"><i class="nav-icon fa fa-edit text-primary mr-2" title="edit"></i></a>
                        <a wire:click.prevent = "showDeleteConfirmation({{ $supplier->id }})" href="#"><i class="nav-icon fa fa-trash text-danger" title="delete"></i></a>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img style="width: 200px" src="{{ asset('backend/dist/assets/images/notfound.png') }}" alt="">
                            <span class="mt-2">No result found!</span>
                        </div>
                    </td>
                </tr>
                
                @endforelse
            </tbody>

        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $suppliers->links() }}
    </div>
      
    <!-- Modal -->
    <div class="modal fade" id="addSupplierForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <form wire:submit.prevent="{{ $editModal ? 'editSupplier' : 'addSupplier' }}">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                        @if ($editModal)
                            <h5 class="modal-title text-white" id="exampleModalLabel">Update Supplier</h5>
                        @else
                            <h5 class="modal-title text-white" id="exampleModalLabel">Add New Supplier</h5>
                        @endif
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Full Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="telephone" class="form-label">Telephone</label>
                                    <input type="text" wire:model.defer="state.telephone" class="form-control @error('telephone') is-invalid @enderror" placeholder="Enter Phone Number">
                                    @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email Address">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" wire:model.defer="state.address" class="form-control" placeholder="Enter Physical Address">
                                </div>
                        </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i>Close</button>
                                
                                @if ($editModal)
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Update</button>
                                @else
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Save</button>
                                @endif
                                </div>
                        </div>
                    </form>
              </div>
    </div>

</div>

<x-delete-confirmation></x-delete-confirmation>

@push('css')

<style>
  .la-ball-clip-rotate,
  .la-ball-clip-rotate > div {
      position: relative;
      -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
              box-sizing: border-box;
  }
  .la-ball-clip-rotate {
      display: block;
      font-size: 0;
      color: #fff;
  }
  .la-ball-clip-rotate.la-dark {
      color: #333;
  }
  .la-ball-clip-rotate > div {
      display: inline-block;
      float: none;
      background-color: currentColor;
      border: 0 solid currentColor;
  }
  .la-ball-clip-rotate {
      width: 32px;
      height: 32px;
  }
  .la-ball-clip-rotate > div {
      width: 32px;
      height: 32px;
      background: transparent;
      border-width: 2px;
      border-bottom-color: transparent;
      border-radius: 100%;
      -webkit-animation: ball-clip-rotate .75s linear infinite;
        -moz-animation: ball-clip-rotate .75s linear infinite;
          -o-animation: ball-clip-rotate .75s linear infinite;
              animation: ball-clip-rotate .75s linear infinite;
  }
  .la-ball-clip-rotate.la-sm {
      width: 16px;
      height: 16px;
  }
  .la-ball-clip-rotate.la-sm > div {
      width: 16px;
      height: 16px;
      border-width: 1px;
  }
  .la-ball-clip-rotate.la-2x {
      width: 64px;
      height: 64px;
  }
  .la-ball-clip-rotate.la-2x > div {
      width: 64px;
      height: 64px;
      border-width: 4px;
  }
  .la-ball-clip-rotate.la-3x {
      width: 96px;
      height: 96px;
  }
  .la-ball-clip-rotate.la-3x > div {
      width: 96px;
      height: 96px;
      border-width: 6px;
  }
  /*
  * Animation
  */
  @-webkit-keyframes ball-clip-rotate {
      0% {
          -webkit-transform: rotate(0deg);
                  transform: rotate(0deg);
      }
      50% {
          -webkit-transform: rotate(180deg);
                  transform: rotate(180deg);
      }
      100% {
          -webkit-transform: rotate(360deg);
                  transform: rotate(360deg);
      }
  }
  @-moz-keyframes ball-clip-rotate {
      0% {
          -moz-transform: rotate(0deg);
              transform: rotate(0deg);
      }
      50% {
          -moz-transform: rotate(180deg);
              transform: rotate(180deg);
      }
      100% {
          -moz-transform: rotate(360deg);
              transform: rotate(360deg);
      }
  }
  @-o-keyframes ball-clip-rotate {
      0% {
          -o-transform: rotate(0deg);
            transform: rotate(0deg);
      }
      50% {
          -o-transform: rotate(180deg);
            transform: rotate(180deg);
      }
      100% {
          -o-transform: rotate(360deg);
            transform: rotate(360deg);
      }
  }
  @keyframes ball-clip-rotate {
      0% {
          -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
              -o-transform: rotate(0deg);
                  transform: rotate(0deg);
      }
      50% {
          -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
              -o-transform: rotate(180deg);
                  transform: rotate(180deg);
      }
      100% {
          -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
              -o-transform: rotate(360deg);
                  transform: rotate(360deg);
      }
  }
</style>

    
@endpush


@push('js')



<script>
    window.addEventListener('showForm', event=>{
        $('#addSupplierForm').modal('show');
    })
</script>

<script>
     $(document).ready(function(){
            toastr.options = {
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "showDuration": "800",
            "timeOut": "10000",
            "progressBar": true,
            }
    });

        window.addEventListener('hideForm', event=>{
            $('#addSupplierForm').modal('hide');
            toastr.success(event.detail.message, 'Success!')
        })
</script>
    
@endpush