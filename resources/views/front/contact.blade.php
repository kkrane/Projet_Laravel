@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
              <div class="well well-sm">
                <form class="form-horizontal" action="{{route('maildev')}}" method="post" >
                  {{csrf_field()}}
                <fieldset>
                  <legend class="text-center">Contact us</legend>
                  <!-- Email input-->
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="email">Your E-mail</label>
                    <div class="col-md-12">
                      <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                    </div>
                  </div>
          
                  <!-- Message body -->
                  <div class="form-group">
                    <label class="col-md-3 control-label" for="message">Your message</label>
                    <div class="col-md-12">
                      <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                    </div>
                  </div>
          
                  <!-- Form actions -->
                  <div class="form-group">
                    <div class="col-md-12 text-right">
                      <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                  </div>
                </fieldset>
                </form>
              </div>
            </div><!-- #end col md 6 -->
            
        </div>
    </div>
@endsection