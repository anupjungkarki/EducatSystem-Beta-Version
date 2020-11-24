
@extends('layouts.admin.app')
@section('content')

<section class="content">
        <div class="row">
            <div class="col-md-12">
               @include('layouts.alert')
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add marks</h3>                   
                       <div class="box-body">
                      <div class="col-md-12  ">
                       
                    
                   <table class="table table-bordered table-striped">
                          <thead class="bg-green"> 
                            <tr>
                                <th style="width: 10px">sn</th>
                             
                                <th>symbol num</th>
                                <th>name</th>
                                @forelse($subjects as $subject)
                                <th>{{$subject->subject_name}}</th>
                                 @empty
                                   <th>no subject</th>
                                @endforelse
                           </tr>
                          </thead>

                           <tbody>
                            <form method="post" action="{{route('admin.marks.store')}}" >
                              @csrf
                           
                              @forelse($symbolNumbers as $symbolNumber)
                               <tr>
                                 <td>{{$loop->iteration}}</td>
                                 <td>{{$symbolNumber->symbol_number}}</td>
                                 <td>{{$symbolNumber->student->name}}</td>

                                    @forelse($subjects as $subject)
                                    <td><input type="text" name="{{$symbolNumber->id}}{{$subject->id}}[mark]">

                                    <input type="hidden" name="{{$symbolNumber->id}}{{$subject->id}}[symbolNumber_id]" value="{{$symbolNumber->id}}">
                                    <input type="hidden" name="{{$symbolNumber->id}}{{$subject->id}}[subject_id]" value="{{$subject->id}}"></td>
                                    <input type="hidden" name="{{$symbolNumber->id}}{{$subject->id}}[symbol_number_category_id]" value="{{$symbol_number_category_id}}">
                                     @empty
                                       <td>no subject</td>
                                     @endforelse
                                 </tr>

                               
                                @empty
                                 <tr>
                                  <td colspan="10"><center>No data found on this <strong>search</strong> </center></td>
                                 </tr>
                                @endforelse

                                <!-- Modal -->

              
                           <tbody>
                          </table>
                         <br>
                       <center> <button type="submit" class=" btn btn-success">Submit</button></center>
                     {{--  @endif --}}
                     </form>
                    </div><!-- /.box-body -->
                  </div>
                </div><!-- /.box -->

            </div><!-- /.col -->
        
    </section><!-- /.content -->


    


@endsection

@section('css')
<style type="text/css">
  .test-file span
{
  font-size: 16px; font-weight: lighter;
}
.margin-style
{
  margin-top: 40px;
}
.profile_student
{
height:120px; width: 120px;
}
.title-s-data
{
  text-decoration: underline;
}
</style>
@endsection


   @section('script')
 

@endsection
 