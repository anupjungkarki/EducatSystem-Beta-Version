@extends('layouts.admin.app')
@section('content')
<!--start content-->
<section class="content">
      <div class='row'>
            <div class='col-md-12'>
              @include('layouts.alert')
                 <div class='box box-primary'>
                     <div class='box-header'>
                      <h3 class='box-title'>{{isset($notice) ? 'Edit Notices' : 'Create Notices'}}</h3>
                      </div><!-- /.box-header -->
                         <div class='box-body'>
                         <form method="post" action="{{isset($notice)? route('admin.notice.update',$notice->id) : route('admin.notice.store')}}">
                          @csrf
                          @if(isset($notice))
                            @method('Post')
                          @endif
                          <div class="row">
                            <div class="col-md-6">
                             <div class="form-group" >
                                <label for="exampleInputnotice">Notice Title</label>
                                <input type="text" class="form-control" name="notice_title" placeholder="Add The Notice Title" value="{{ isset($notice)?$notice->notice_title:''}}">
                             </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputDate">Date of Notice</label>
                                <input type="date" class="form-control" name="date_of_notice" placeholder="Add Date" value="{{isset($notice) ? $notice->date_of_notice : ''}}">
                             </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputsubject">Notice Subject</label>
                                <input type="text" class="form-control" name="notice_subject" placeholder="Add The Notice Subject" value="{{isset($notice) ? $notice->notice_subject : ''}}">
                             </div>
                           </div>
                          </div>

                             <div class="form-group">
                              <label for="exampleInputdescription">Add Description</label>
                              <textarea type="text" class="form-control" placeholder="Add The Notice Description" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="{{isset($notice) ? $notice->description : ''}}"></textarea>
                             </div> 
                            <div class="box-footer">
                              <center><button type="submit" class="btn btn-primary btn-flat">{{isset($notice) ? 'Update The Notices' : 'Post Notices' }}</button></center>
                            </div> 
                         </form>
                       </div>
                 </div>
            </div><!-- /.col-->
         </div><!-- ./row -->
</section><!-- /.content -->

@endsection
 