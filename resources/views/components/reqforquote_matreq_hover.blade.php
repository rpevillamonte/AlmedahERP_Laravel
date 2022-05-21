<div class='row'>
    <div class='col-12'>
        <div class='row p-1'>
            <div class='col-12 d-flex flex-column'>
                <div class='row justify-content-center'>
                    <div class='col-6'>
                        <small><b>ID: </b></small>
                    </div>
                    <div class='col-6'>
                        <small class='w-100'>{{ $matreq_id }}</small>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <small><b>Requested Materials: </b></small>
                    </div>
                    <div class='col-6'>
                        <small class='w-100'>
                            <ul class='m-2'>
                                @foreach ($list as $rm)
                                    <li>
                                        <p>
                                            <b>CODE:</b> {{ $rm->item_code }}
                                            <br>
                                            <b>REQUESTED:</b> {{ $rm->quantity_requested }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </small>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <small><b>Purpose: </b></small>
                    </div>
                    <div class='col-6'>
                        <small class='w-100'>{{ $purpose }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
