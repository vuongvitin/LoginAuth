@extends('admin.users.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@Section('contents')
<div class="card card-primary">
    <form action="" method="POST">
      <div class="card-body">
        <div class="form-group">
          <label for="menu">Ten danh muc moi</label>
          <input type="text" class="form-control" name="name" id="menu" placeholder="Nhap ten danh muc">
        </div>
        <div class="form-group">
            <label>Danh muc</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="0">Danh muc cha</option>
                @foreach ($menus as $menu)
                  <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Mo ta</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Mo ta chi tiet</label>
            <textarea name="content" class="form-control" id="content"></textarea>
        </div>

        <div class="form-group">
            <label>Kich hoat</label>
            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" value="1" id="active" name="active" checked="">
              <label for="customRadio1" class="custom-control-label">Co</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" value="0" id="no_active" name="active">
              <label for="customRadio2" class="custom-control-label">Khong</label>
            </div>
          </div>
      
          @csrf

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection