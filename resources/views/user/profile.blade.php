<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>User Profile Page</title>
        <link rel="stylesheet" href="{{asset('user/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('user/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{asset('user/assets/vendors/css/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{asset('user/assets/vendors/select2/select2.min.css')}}" />
        <link rel="stylesheet" href="{{asset('user/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('user/assets/css/demo_1/style.css')}}" />
        <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <body>
        <div class="container-scroller">
            @include('user.partials._sidebar')
            <div class="container-fluid page-body-wrapper">
                @include('user.partials._navbar')
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="container bg-white py-3 px-3 " style=" border:1px solid rgb(226, 218, 218)">
                            <div class="page-header">
                                <h5 class="page-title">Profile Settings</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img src="/storage/{{$detail->image}}" class="text-center" alt="profile_image" srcset="" style="height: 120px; width:120px; border-radius:50%; margin-left:43%">
                                    </div>
                                </div>
                            </div>   
                            <form action="/user-image-update" id="imageForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="file" class="form-control" id="imageUpload" accept="image/*" name="image" />
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cropModal">
                                                Choose Image
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button id="saveBtn" class="btn btn-warning d-none">Save</button>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <span id="cancelBtn" class="btn btn-light d-none">Cancel</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <div id="profile-success-message" style="display: none;" class="alert alert-success"></div>
                            <form action="/user-personal-update" method="POST" id="profileForm">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <input type="text" class="form-control" id="firstName" name="first_name" value="{{$detail->first_name}}" placeholder="Enter First Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" name="last_name" value="{{$detail->last_name}}" placeholder="Enter Last Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Enter Email" required disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date_of_birth">Date Of Birth</label>
                                            <input type="date" class="form-control" id="date_of_birth" value="{{$detail->date_of_birth}}" name="date_of_birth" placeholder="Enter First Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nric_number">NRIC Number</label>
                                            <input type="text" class="form-control" id="nric_number" value="{{$detail->nric_number}}" name="nric_number" placeholder="Enter Last Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_number">Passport Number</label>
                                            <input type="text" class="form-control" id="passport_number" value="{{$detail->passport_number}}" name="passport_number" placeholder="Enter Email" required disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select name="gender" class="form-control" id="gender" disabled>
                                                <option value="{{$detail->gender}}">{{$detail->gender}}</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="short_name">Short Name</label>
                                            <input type="text" class="form-control" id="short_name" value="{{$detail->short_name}}" name="short_name" placeholder="Enter Last Short Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="race">Race</label>
                                            <input type="text" class="form-control" id="rece" value="{{$detail->race}}" name="race" placeholder="Enter Race" required disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address1">Address 1</label>
                                            <input type="text" class="form-control" id="address1" value="{{$detail->address1}}" name="address1" placeholder="Enter Address 1" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address2">Address 2</label>
                                            <input type="text" class="form-control" id="address2" value="{{$detail->address2}}" name="address2" placeholder="Enter Address 2" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" value="{{$detail->city}}" name="city" placeholder="Enter city" required disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postal_code">Postal Code</label>
                                            <input type="text" class="form-control" id="postal_code" value="{{$detail->postal_code}}" name="postal_code" placeholder="Enter Postal Code" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="state" value="{{$detail->state}}" name="state" placeholder="Enter State" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select name="country" id="country" class="form-control" disabled>
                                                <option value="{{$detail->country}}">{{$detail->country}}</option>
                                                @foreach ($counties as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="profileSaveButton" class="btn btn-success d-none" >Save</button>
                                <button type="button" id="profileCancelButton" class="btn btn-danger d-none">Cancel</button>
                                <span id="profileEditButton" class="btn btn-secondary">Edit</span>
                            </form>
                        </div>
                        <div class="container bg-white py-3 px-3 " style=" border:1px solid rgb(226, 218, 218); margin-top:20px;">
                            <div class="page-header">
                                <h5 class="page-title">Bank Settings</h5>
                            </div>
                            <div id="bank-success-message" style="display: none;" class="alert alert-success"></div>
                            <form action="/user-bank-update" method="POST" id="bankForm">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank_name">Bank Name</label>
                                            <input type="text" class="form-control" id="bank_name" value="{{$bank->bank_name}}" name="bank_name" placeholder="Enter Bamk Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="account_holder">Account Holder Name</label>
                                            <input type="text" class="form-control" id="account_holder" value="{{$bank->account_holder}}" name="account_holder" placeholder="Enter Account Holder Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="account_number">Account Number</label>
                                            <input type="text" class="form-control" id="account_number" value="{{$bank->account_number}}" name="account_number" placeholder="Enter Account Number" required disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="swift_code">Swift Code</label>
                                            <input type="text" class="form-control" id="swift_code" value="{{$bank->swift_code}}" name="swift_code" placeholder="Enter Bamk Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank_branch">Bank Branch</label>
                                            <input type="text" class="form-control" id="bank_branch" value="{{$bank->bank_branch}}" name="bank_branch" placeholder="Enter Account Holder Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank_address1">Address 1</label>
                                            <input type="text" class="form-control" id="bank_address1" value="{{$bank->address1}}" name="bank_address1" placeholder="Enter Account Number" required disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank_address2">Address 2</label>
                                            <input type="text" class="form-control" id="bank_address2" value="{{$bank->address2}}" name="bank_address2" placeholder="Enter Bamk Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank_city">City</label>
                                            <input type="text" class="form-control" id="bank_city" value="{{$bank->city}}" name="bank_city" placeholder="Enter Account Holder Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank_state">State</label>
                                            <input type="text" class="form-control" id="bank_state" value="{{$bank->state}}" name="bank_state" placeholder="Enter Account Number" required disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank_postal_code">Postal Code</label>
                                            <input type="text" class="form-control" id="bank_postal_code" value="{{$bank->postal_code}}" name="bank_postal_code" placeholder="Enter Bamk Name" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank_country">Country</label>
                                            <select name="bank_country" id="" class="form-control" disabled>
                                                <option value="{{$bank->country}}">{{$bank->country}}</option>
                                                @foreach ($counties as $country)
                                                <option value="{{$country->name}}" >{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="bankSaveButton" class="btn btn-success d-none" >Save</button>
                                <button type="button" id="bankCancelButton" class="btn btn-danger d-none">Cancel</button>
                                <span id="bankEditButton" class="btn btn-secondary">Edit</span>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="cropModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cropModalLabel">Crop Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="cropper-container">
                                        <img id="croppableImage" src="/path_to_default_image" alt="profile_image" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button id="saveCroppedImage" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('user.partials._footer')
                </div>
            </div>
        </div>
        <script src="{{asset('user/assets/vendors/js/vendor.bundle.base.js')}}"></script>
        <script src="{{asset('user/assets/vendors/select2/select2.min.js')}}"></script>
        <script src="{{asset('user/assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
        <script src="{{asset('user/assets/js/off-canvas.js')}}"></script>
        <script src="{{asset('user/assets/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('user/assets/js/misc.js')}}"></script>
        <script src="{{asset('user/assets/js/settings.js')}}"></script>
        <script src="{{asset('user/assets/js/todolist.js')}}"></script>
        <script src="{{asset('user/assets/js/file-upload.js')}}"></script>
        <script src="{{asset('user/assets/js/typeahead.js')}}"></script>
        <script src="{{asset('user/assets/js/select2.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            .profile-image-section {
                text-align: center;
                margin-top: 20px;
            }
            #profile-image {
                width: 100px;
                height: 100px;
                border-radius: 50%; /* Rounded profile image */
                object-fit: cover;
                object-position: center;
            }
            .container-section {
                background-color: #ffffff; /* White section background */
                padding: 20px;
                margin-top: 20px;
                max-width: 800px;
                max-height: 300px;
                -webkit-box-shadow: 0px 0px 18px 0px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 18px 0px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 18px 0px rgba(0,0,0,0.75)
            }
            .form-control{
                height: 40px;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                function toggleProfileFormEditability(editable) {
                    $('#profileForm input, #profileForm select').prop('disabled', !editable);
                    $('#profileSaveButton, #profileCancelButton').toggleClass('d-none', !editable);
                    $('#profileEditButton').toggleClass('d-none', editable);
                }
                function toggleBankFormEditability(editable) {
                    $('#bankForm input, #bankForm select').prop('disabled', !editable);
                    $('#bankSaveButton, #bankCancelButton').toggleClass('d-none', !editable);
                    $('#bankEditButton').toggleClass('d-none', editable);
                }
                $('#profileEditButton').click(function() {
                    toggleProfileFormEditability(true);
                });
                $('#profileCancelButton').click(function() {
                    toggleProfileFormEditability(false);
                });
                $('#bankEditButton').click(function() {
                    toggleBankFormEditability(true);
                });
                $('#bankCancelButton').click(function() {
                    toggleBankFormEditability(false);
                });
                $('#imageUpload').change(function() {
                    var fileName = $(this).val().split('\\').pop();
                    $('#selectImageButton').text(fileName);
                });
                $('#profileSaveButton').click(function() {
                });
                $('#bankSaveButton').click(function() {
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#profileForm').submit(function(e) {
                    e.preventDefault(); 
                    var formData = $(this).serialize();
                    $.ajax({
                        type: 'POST',
                        url: '/user-personal-update',
                        data: formData,
                        success: function(response) {
                            $('#profile-success-message').html('Profile Update successfully!');
                            $('#profile-success-message').show();
                            $('#profileForm input, #profileForm select').prop('disabled', true);
                            $('#profileSaveButton, #profileCancelButton').addClass('d-none');
                            $('#profileEditButton').removeClass('d-none');
                        },
                        error: function(error) {
                            console.error('Error occurred:', error);
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#bankForm').submit(function(e) {
                    e.preventDefault(); 
                    var formData = $(this).serialize();
                    $.ajax({
                        type: 'POST',
                        url: '/user-bank-update',
                        data: formData,
                        success: function(response) {
                            $('#bank-success-message').html('Bank Update successfully!');
                            $('#bank-success-message').show();
                            $('#bankForm input, #bankForm select').prop('disabled', true);
                            $('#bankSaveButton, #bankCancelButton').addClass('d-none');
                            $('#bankEditButton').removeClass('d-none');
                        },
                        error: function(error) {
                            console.error('Error occurred:', error);
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#imageUpload').change(function() {
                    $('#saveBtn, #cancelBtn').removeClass('d-none'); // Show the buttons
                });
                $('#saveBtn').click(function(e) {
                    e.preventDefault();
                    var formData = new FormData($('#imageForm')[0]);
                    $.ajax({
                        url: '/user-image-update', // Replace with your upload endpoint
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log('Image uploaded successfully');
                            $('#imageForm')[0].reset(); // Reset the form after successful upload
                            $('#saveBtn, #cancelBtn').addClass('d-none'); // Hide the buttons after successful upload
                        },
                        error: function(error) {
                            console.error('Error uploading image:', error);
                        }
                    });
                });
                $('#cancelBtn').click(function() {
                    $('#imageForm')[0].reset(); // Reset the form on cancel
                    $('#saveBtn, #cancelBtn').addClass('d-none'); // Hide the buttons on cancel
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#cropModal').on('shown.bs.modal', function() {
                    var cropper = new Cropper(document.getElementById('croppableImage'), {
                        aspectRatio: 1, // Round shape (1:1 aspect ratio)
                        viewMode: 1, // Restricts the crop box to always fit within the canvas
                        crop: function(event) {
                        }
                    });
                    $('#saveCroppedImage').click(function() {
                        var croppedCanvas = cropper.getCroppedCanvas({
                            width: 120, // Adjust dimensions if needed
                            height: 120,
                        });
                        var croppedImage = croppedCanvas.toDataURL('image/png');
                        $('#croppableImage').attr('src', croppedImage);
                        $('#cropModal').modal('hide'); // Hide the modal after cropping
                    });
                });
                $('#cropModal').on('hidden.bs.modal', function() {
                    var cropper = $('#croppableImage').data('cropper');
                    cropper.destroy(); // Destroy the cropper instance to reset
                });
            });
        </script>
    </body>
</html>