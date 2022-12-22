@extends('layouts.app', ['page' => 'Register Client', 'pageSlug' => 'clients', 'section' => 'clients'])

@section('content')
<script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Register Client</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('clients.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Client Information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Name</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('name') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        <label class="form-control-label" for="input-document_type">Offices</label>
                                        <select name="document_type" id="input-document_type" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                            {{-- @foreach (['Head Office', 'Jatrabari', 'Panchabati', 'Tushvandar', 'Lakhmipur'] as $document_type)
                                                @if($document_type == old('document_type'))
                                                    <option value="{{$document_type}}" selected>{{$document_type}}</option>
                                                @else
                                                    <option value="{{$document_type}}">{{$document_type}}</option>
                                                @endif
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-control-label" for="input-document_id">Employee ID</label>
                                        <input type="number" name="document_id" id="input-document_id" class="form-control form-control-alternative{{ $errors->has('document_id') ? ' is-invalid' : '' }}" placeholder="Document Number" value="{{ old('document_id') }}" required>
                                        @include('alerts.feedback', ['field' => 'document_id'])

                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">Email</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}" required>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-phone">Telephone</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Telephone" value="{{ old('phone') }}" required>
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // on product change event
            $('#input-name').on('click', function() {
                var table = $(this).val();
                // console.log(table);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: 'https://www.bilil.net:8999/api/common-dropdowns/get-plans',
                    success: function(response) {
                        console.log(response);
                        $('#input-document_type').html('');
                        if (response.success) {
                            $('#input-document_type').append($("<option />").val(0).text(
                                'Select Office'));
                            if (response.data.length > 0) {
                                $.each(response.data, function(res) {
                                    // console.log('input-document_type');
                                    // console.log(response.data[res]);
                                    $('#input-document_type').append($("<option />").val(response
                                        .data[
                                            res].Table).text(response.data[res]
                                        .Name));
                                });
                            }
                        } else {
                            $('#input-document_type').append($("<option />").val(0).text(
                                'Select Office'));
                        }
                    },
                    error: function(r) {
                        console.log(r);
                    }
                });
            });
        });
    </script>
@endsection
