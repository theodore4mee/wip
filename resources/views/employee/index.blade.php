@extends('layouts.default')
@section('content')
    <div class="container mt-5">
        <div style="width:100%; max-width: 800px; margin:0 auto;">
            @if($employeeList->count() > 0)
                <div class="row">
                    <div class="col-md-6" style="color:#fff">
                        <h3>Employees</h3>
                        <p>There are {{ $employeeList->count() }} employees</p>
                    </div>
                    <div class="col-md-6">
                        <div class='' style="float:right;padding-top: 30px">
                            <button class="btn" type="button" data-toggle="modal" data-target="#ModalCreate" style="color:#fff;font-weight:bold; background-color:#8006D6; border-radius: 20px;">
                                <span class="badge" style="color:#8006D6;background-color:#fff;">+</span> New Employee
                            </button>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-body">
                        @foreach($employeeList as $person)
                            <div class="row border border-secondary custome-list" onclick="GetUser({{ $person['id'] }});">
                                <div class='col-md-3'>
                                    @if ( $person['id'] < 10 )
                                        <p style="padding-left: 7px">
                                        <div class="rcorners4">0{{ $person['id'] }}</div></p>
                                    @else
                                        <p style="padding-left: 7px">
                                        <div class="rcorners4">{{ $person['id'] }}</div></p>
                                    @endif
                                </div>
                                <div class='col-md-3'>
                                    <p style="padding: 13px">{{ $person['first_name'] }}</p>
                                </div>
                                <div class='col-md-3'>
                                    <p style="padding: 13px">{{ $person['last_name'] }}</p>
                                </div>
                                <div class='col-md-3'>
                                    <p style="padding: 13px">{{ $person['contact'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-6" style="color:#fff">
                        <h3>Employees</h3>
                        <p>No employees</p>
                    </div>
                    <div class="col-md-6">
                        <div class='' style="float:right;padding-top: 30px">
                            <button class="btn" type="button" data-toggle="modal" data-target="#ModalCreate" style="color:#fff;font-weight:bold; background-color:#8006D6; border-radius: 20px;">
                                <span class="badge" style="color:#8006D6;background-col§or:#fff;">+</span> New Employee
                            </button>
                        </div>
                    </div>
                    <div class="center">
                        <img src="/Icon.JPG">
                        <div class="center" style="width: 100% !important;color: #fff; padding-left: 74px;">
                            <p>There is nothing here</p>
                            <p>Create a new employee by clicking the <br/> <b>New Employee</b> button to get started</b></p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

            @include('employee.modals.create')
            @include('employee.modals.edit')

            <script>
                $(document).ready(function () {
                    jQuery.fn.extend({
                        createRepeater: function () {
                            var addItem = function (items, key) {
                                var itemContent = items;
                                var group = itemContent.data("group");
                                var item = itemContent;
                                var input = item.find('input,select');
                                input.each(function (index, el) {
                                    var attrName = $(el).data('name');
                                    var skipName = $(el).data('skip-name');
                                    if (skipName != true) {
                                        $(el).attr("name", group + "[" + key + "]" + attrName);
                                    } else {
                                        if (attrName != 'undefined') {
                                            $(el).attr("name", attrName);
                                        }
                                    }
                                })
                                var itemClone = items;

                                /* Handling remove btn */
                                var removeButton = itemClone.find('.remove-btn');

                                if (key == 0) {
                                    removeButton.attr('disabled', true);
                                } else {
                                    removeButton.attr('disabled', false);
                                }

                                $("<div class='items'>" + itemClone.html() + "<div/>").appendTo(repeater);
                            };
                            /* find elements */
                            var repeater = this;
                            var items = repeater.find(".items");
                            var key = 0;
                            var addButton = repeater.find('.repeater-add-btn');
                            var newItem = items;

                            if (key == 0) {
                                items.remove();
                                addItem(newItem, key);
                            }

                            /* handle click and add items */
                            addButton.on("click", function () {
                                key++;
                                addItem(newItem, key);
                            });
                        }
                    });

                    $("#repeater").createRepeater();
                    $('#repeater_form').on('submit', function (event) {
                        event.preventDefault();
                        $.ajax({
                            url: "/employee/create",
                            method: "POST",
                            data: $(this).serialize(),
                            success: function (data) {
                                $('#repeater_form')[0].reset();
                                $("#repeater").createRepeater();
                                $('#success_result').html(data);
                                ß
                            }
                        });
                    });
                    $('#erepeater_form').on('submit', function (event) {
                        event.preventDefault();
                        $.ajax({
                            url: "/employee/edit",
                            method: "POST",
                            data: $(this).serialize(),
                            success: function (data) {
                                $('#repeater_form')[0].reset();
                                $("#repeater").createRepeater();
                                $('#success_result').html(data);
                                ß
                            }
                        });
                    });
                    $("#datepicker").datepicker();
                });

                function GetUser(id) {
                    $.ajax({
                        url: "/employee/fetch/" + id,
                        method: "GET",
                        data: $(this).serialize(),
                        success: function (data) {
                            var obj = JSON.parse(data);
                            $("#efirstName").val(obj.first_name);
                            $("#elastName").val(obj.last_name);
                            $("#econtactNumber").val(obj.contact);
                            $("input[name=edatepicker]").val(obj.dob);
                            $("#eemailAddress").val(obj.email);
                            $("#estreetAddress").val(obj.street_address);
                            $("#ecityAddress").val(obj.city_address);
                            $("#epostalCodeAddress").val(obj.postal_code_address);
                            $("#ecountryAddress").val(obj.country_address);
                            $('#ModalEdit').modal({
                                show: 'true'
                            });

                        }
                    });
                }
            </script>
            <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
@stop
