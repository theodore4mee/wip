<div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="ModalCreate" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-custome rcorners44" style="float:left; margin-left:10px; max-width: 600px;" role="document">
        <div class="modal-content">
            <div class="modal-body" style="width:100%; max-width: 600px; margin:0 auto;">
                <span id="success_result"></span>
                <span class="mb-4 tl">Basic info</span>
                <div class="clearfix"></div>
                <form method="post" action="/create" id="repeater_form">
                    <div class="form-group col-sm-6">
                        <label>First Name</label>
                        <input type="text" name="firstName" id="firstName" class="input-field form-control" required/>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="input-field form-control" required/>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Contact Number</label>
                        <input type="text" name="contactNumber" id="contactNumber" class="input-field form-control" required/>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Email Address</label>
                        <input type="text" name="emailAddress" id="emailAddress" class="input-field form-control" required/>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class='input-group date'>
                            <input type='text' size="8" name='datepicker' id='datepicker' data-date-format="mm/dd/yyyy" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                               </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="mb-4 tl">Address info</span>
                        <div class="clearfix"></div>

                        <div class="form-group col-sm-12">
                            <label>Street Address</label>
                            <input type="text" name="streetAddress" id="streetAddress" class="input-field form-control" required/>
                        </div>
                        <div class="form-group">
                            <div class='col-sm-4 '>
                                <label>City</label>
                                <input type="text" name="cityAddress" id="cityAddress" class="input-field form-control" required/>
                            </div>
                            <div class='col-sm-4'>
                                <label>Postal Code</label>
                                <input type="text" name="postalCodeAddress" id="postalCodeAddress" class="input-field form-control" required/>
                            </div>
                            <div class='col-sm-4'>
                                <label>Country</label>
                                <input type="text" name="countryAddress" id="countryAddress" class="input-field form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="repeater">
                        <div class="repeater-heading tl">
                            Skills
                        </div>
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <div class="items" data-group="programming_languages">
                            <div class="item-content">
                                <div class="form-group col-sm-12">
                                    <div class="row mt-4">
                                        <div class='col-sm-4'>
                                            <label>Skill</label>
                                            <input type="text" data-skip-name="true" data-name="nameSkill[]" name="nameSkill[]" id="nameSkill" class="input-field form-control" required/>
                                        </div>
                                        <div class='col-sm-2'>
                                            <label>Yrs Exp</label>
                                            <input type="text" data-skip-name="true" data-name="yrsExpSkill[]" name="yrsExpSkill[]" id="yrsExpSkill" class="input-field form-control" required/>
                                        </div>
                                        <div class='col-sm-4'>
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
                            <div class="clearfix"></div>
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-secondary col-sm-12 repeater-add-btn" style="color:gray;"> + Add New Skill</button>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <div class="form-group">
                        <div class='' style="float:right;">
                            <button class="btn" type="button" style="background-color:#8006D6; border-radius: 20px;">
                                <span class="badge" style="color:#8006D6;background-color:#fff;">+</span> Save changes to Employee
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</div>
</div>
</div>
