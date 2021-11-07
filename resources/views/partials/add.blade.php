<div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="ModalCreate" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCreate">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="width:100%; max-width: 600px; margin:0 auto;">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add Employee</div>
                        <div class="panel-body">
                            <span id="success_result"></span>
                            <span class="mb-4">Basic info</span>
                            <div class="clearfix"></div>
                            <form method="post" action="/create" id="repeater_form">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="firstName" id="firstName" class="input-field form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lastName" id="lastName" class="input-field form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="contactNumber" id="contactNumber" class="input-field form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" name="emailAddress" id="emailAddress" class="input-field form-control" required/>
                                </div>
                                <div class="form-group">
                                    <div class='input-group date'>
                                        <input type='text' size="8" name='datepicker' id='datepicker' data-date-format="mm/dd/yyyy" class="form-control"/>
                                        <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                               </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="mb-4">Address info</span>
                                    <div class="clearfix"></div>

                                    <div class="form-group">
                                        <label>Street Address</label>
                                        <input type="text" name="streetAddress" id="streetAddress" class="input-field form-control" required/>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-4'>
                                            <label>City</label>
                                            <input type="text" name="cityAddress" id="cityAddress" class="input-field form-control" required/>
                                        </div>
                                        <div class='col-md-4'>
                                            <label>Postal Code</label>
                                            <input type="text" name="postalCodeAddress" id="postalCodeAddress" class="input-field form-control" required/>
                                        </div>
                                        <div class='col-md-4'>
                                            <label>Country</label>
                                            <input type="text" name="countryAddress" id="countryAddress" class="input-field form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div id="repeater">
                                    <div class="repeater-heading">
                                        Skills
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                    <div class="items" data-group="programming_languages">
                                        <div class="item-content">
                                            <div class="form-group">
                                                <div class="row mt-4">
                                                    <div class='col-md-4'>
                                                        <label>Skill</label>
                                                        <input type="text" data-skip-name="true" data-name="nameSkill[]" name="nameSkill[]" id="nameSkill" class="input-field form-control" required/>
                                                    </div>
                                                    <div class='col-md-2'>
                                                        <label>Yrs Exp</label>
                                                        <input type="text" data-skip-name="true" data-name="yrsExpSkill[]" name="yrsExpSkill[]" id="yrsExpSkill" class="input-field form-control" required/>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <label>Seniority rating</label>
                                                        <select type="text" data-skip-name="true" data-name="ratingSkill[]" name="ratingSkill[]" id="ratingSkill" class="input-field form-control" required>
                                                            <option></option>
                                                            <option value="Senior">Senior</option>
                                                            <option value="Intermediate">Intermediate</option>
                                                            <option value="Junior">Junior</option>
                                                        </select>
                                                    </div>
                                                    <div class='col-md-2'>
                                                        <label>&nbsp;</label>
                                                        <span class="input-group-addon" onclick="$(this).parents('.items').remove()" style="background-color: #fff; cursor: pointer;border: 0px solid #ccc;">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div align="right">
                                        <button type="button" class="btn btn-primary repeater-add-btn"> + Add New Skill</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class='input-group date'>
                                        <input type="submit" name="submit" value="submit">
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
    @parent

    <script>
        $(function () {
            $('#registerForm').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serializeArray();
                $(".invalid-feedback").children("strong").text("");
                $("#registerForm input").removeClass("is-invalid");
                $.ajax({
                    method: "POST",
                    headers: {
                        Accept: "application/json"
                    },
                    url: "",
                    data: formData,
                    success: () => window.location.assign(""),
                    error: (response) => {
                        if(response.status === 422) {
                            let errors = response.responseJSON.errors;
                            Object.keys(errors).forEach(function (key) {
                                $("#" + key + "Input").addClass("is-invalid");
                                $("#" + key + "Error").children("strong").text(errors[key][0]);
                            });
                        } else {
                            window.location.reload();
                        }
                    }
                })
            });
        })

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
            $("#datepicker").datepicker();
        });
        function GetUser(id){
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
                }
            });
        }
    </script>
@endsection
