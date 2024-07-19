@extends('back_end.admin')
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="d-flex justify-content-center row">
              <div class="col-12 col-md-6 col-lg-10">
                <form action="/handle_category" method="post">
                @csrf
                <div class="card">
                  <div class="d-flex justify-content-between card-header">
                    
                    <h4>Thêm Danh Mục</h4>
                    <button href="#" class="w-25 btn btn-primary">Thêm </button>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Tên Danh Mục</label>
                      <input name="namecategory" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input name="Description" type="text" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label>Status</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                           
                          </div>
                         <select name="statuscategory" >
                            <option value="1">Hoạt động</option>
                            <option value="2">Tạm Ngưng</option>
                         </select>
                        </div>
                      </div>
                    
                  </div>
                  
                </div>
            </form>
              </div>
              
            </div> 
          </div>
        </section>
       
      </div>
</div>
    
@endsection