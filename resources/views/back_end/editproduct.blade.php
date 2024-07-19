@extends('back_end.admin')
@section('content')
<div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <section class="section">
          <form action="{{route('update_product')}}" method="post" enctype="multipart/form-data">
           @csrf
          @method('PUT')
          <div class="section-body">
            <input type="hidden" name="ProductID" value="{{$prodt['ProductID']}}" >
            <div class="d-flex justify-content-center row">
              <div class="col-12 col-md-6 col-lg-10">
                <div class="card">
                  <div class="card-header">
                    <h4>Cập Nhật Sản Phẩm</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>ProductName</label>
                      <input name="ProductName" type="text" class="form-control"  value="{{$prodt['ProductName']}}">
                    </div>
                    <div class="form-group">
                      <label>Desciption</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                         
                        </div>
                        <input name="Description" type="text" class="form-control " value="{{$prodt['Description']}}">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label>Price</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            $
                          </div>
                        </div>
                        <input name="Price" type="text" class="form-control currency"  value="{{$prodt['Price']}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input name="img" type="file" class="form-control "  value="{{$prodt['Image']}}">
                    </div>
                    <div class="form-group">
                      <label >Category</label><br>
                     <select name="CategoryID" id="">
                      @foreach ($data_category as $cat)
                      <option value="{{ $cat->CategoryID }}" {{ $cat->CategoryID == $prodt['CategoryID'] ? 'selected' : '' }}>
                        {{ $cat->CategoryName }}
                      </option>
                      @endforeach
                      
                     </select>
                    </div>
                    <div class="form-group">
                      <label>StockQuantity</label>
                      <input name="StockQuantity" type="text" class="form-control datemask"  value="{{$prodt['StockQuantity']}}">
                    </div>
                    <select name="statuscategory" >
                      <option value="1">Hoạt động</option>
                      <option value="2">Tạm Ngưng</option>
                   </select> 
                  </div>
                  <div class="card-footer">
                   <input type="submit" value="Cập Nhật Sản Phẩm">
                  </div>
                </div>
                
              </div>
              
            </div>
          </div>
        
        </form>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
    
@endsection