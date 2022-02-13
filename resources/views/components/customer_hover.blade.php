<div class='row'>
    <div class='col-12 d-flex justify-content-center p-1'>
        @if(isset($image))
            {{ $image }}
        @else
            <div class='p-1'>
                <h5>No Picture</h5>
            </div>
        @endif
        
    </div>
    <div class='col-12'>
        <div class='row p-1'>
            <div class='col-12 d-flex flex-column'>
                <div class='row justify-content-center'>
                    <div class='col-6'>
                        <small><b>Name: </b></small>
                    </div>
                    <div class='col-6'>
                        <small class='w-100'>{{ $customer_name }}</small>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <small><b>Branch Name: </b></small>
                    </div>
                    <div class='col-6'>
                        <small class='w-100'>{{ $branch }}</small>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <small><b>Contact Number: </b></small>
                    </div>
                    <div class='col-6'>
                        <small class='w-100'>{{ $contact_number }}</small>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <small><b>Address: </b></small>
                    </div>
                    <div class='col-6'>
                        <small class='w-100'>{{ $address }}</small>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <small><b>Email Address: </b></small>
                    </div>
                    <div class='col-6'>
                        <small class='w-100'>{{ $email_address }}</small>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <small><b>Company Name: </b></small>
                    </div>
                    <div class='col-6'>
                        <small class='w-100'>{{ $company_name }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
