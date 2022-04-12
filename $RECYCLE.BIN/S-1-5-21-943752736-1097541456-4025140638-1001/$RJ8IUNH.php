<div>
    <div class="Polaris-Page">
        <div class="Polaris-Page-Header Polaris-Page-Header--noBreadcrumbs Polaris-Page-Header--mediumTitle">
            <div class="Polaris-Page-Header__Row">
                <div class="Polaris-Page-Header__TitleWrapper">
                    <div>
                    <div class="Polaris-Header-Title__TitleAndSubtitleWrapper">
                        <h1 class="Polaris-Header-Title">Rules</h1>
                    </div>
                    </div>
                </div>
                <div class="Polaris-Page-Header__RightAlign">
                    <div class="Polaris-Page-Header__PrimaryActionWrapper"><button class="Polaris-Button Polaris-Button--primary" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Save</span></span></button></div>
                </div>
            </div>
        </div>
        <div class="Polaris-Page__Content">
            <div class="mt-15">
                <div class="Polaris-Layout">
                    <div class="Polaris-Layout__Section">
                        <div class="Polaris-Card">
                            <div class="Polaris-Card__Section">
                                <div>
                                    <label class="Polaris-Choice" for="PolarisCheckbox3">
                                    <span class="Polaris-Choice__Control">
                                        <span class="Polaris-Checkbox">
                                            <input id="PolarisCheckbox3" type="checkbox" class="Polaris-Checkbox__Input" aria-invalid="false" aria-describedby="PolarisCheckbox3HelpText" role="checkbox" aria-checked="false" value=""><span class="Polaris-Checkbox__Backdrop"></span>
                                            <span class="Polaris-Checkbox__Icon">
                                                <span class="Polaris-Icon">
                                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                                    <path d="M8.315 13.859l-3.182-3.417a.506.506 0 0 1 0-.684l.643-.683a.437.437 0 0 1 .642 0l2.22 2.393 4.942-5.327a.436.436 0 0 1 .643 0l.643.684a.504.504 0 0 1 0 .683l-5.91 6.35a.437.437 0 0 1-.642 0"></path>
                                                </svg>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="Polaris-Choice__Label">Manual</span>
                                    </label>
                                    <div class="Polaris-Choice__Descriptions">
                                        <div class="Polaris-Choice__HelpText" id="PolarisCheckbox3HelpText">Manually enable "Request for quote" feature for products.</div>
                                    </div>
                                </div>   
                            </div>
                            <div class="Polaris-Card__Section">
                                <div class="">
                                    <div class="Polaris-Labelled__LabelWrapper">
                                        <div class="Polaris-Label">
                                            <label id="PolarisTextField2Label" for="PolarisTextField2" class="Polaris-Label__Text">
                                            <h3 aria-label="ENABLE QUOTE PRODUCTS" class="Polaris-Subheading">ENABLE QUOTE PRODUCTS</h3>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                            <div class="Polaris-TextField">
                                            <input id="PolarisTextField2" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                            </div>
                                        </div>
                                        <div class="Polaris-Connected__Item browse_product"><button class="Polaris-Button" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Browse products</span></span></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="Polaris-Card">      
                            <div class="Polaris-Card__Section">
                                <h3 aria-label="CONDITIONS" class="Polaris-Subheading">CONDITIONS</h3>
                                <div class="mt-5 flex">
                                    <label style="line-height: 28px;">Products must match:</label>
                                    <div class="ml-10">
                                        <fieldset class="Polaris-ChoiceList" id="match_condition" aria-invalid="false">
                                            <ul class="Polaris-ChoiceList__Choices">
                                                <li>
                                                    <label class="Polaris-Choice" for="PolarisRadioButton1">
                                                        <span class="Polaris-Choice__Control">
                                                            <span class="Polaris-RadioButton">
                                                                <input id="PolarisRadioButton1" name="match_condition" type="radio" class="Polaris-RadioButton__Input" value="and" checked="" /><span class="Polaris-RadioButton__Backdrop"></span>
                                                            </span>
                                                        </span>
                                                        <span class="Polaris-Choice__Label">all conditions</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </fieldset>
                                    </div>
                                    <div class="ml-10">
                                        <fieldset class="Polaris-ChoiceList" id="match_condition" aria-invalid="false">
                                            <ul class="Polaris-ChoiceList__Choices">
                                                <li>
                                                    <label class="Polaris-Choice" for="PolarisRadioButton2">
                                                        <span class="Polaris-Choice__Control">
                                                            <span class="Polaris-RadioButton"><input id="PolarisRadioButton2" name="match_condition" type="radio" class="Polaris-RadioButton__Input" value="or" /><span class="Polaris-RadioButton__Backdrop"></span></span>
                                                        </span>
                                                        <span class="Polaris-Choice__Label">any conditions</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </fieldset>
                                    </div>
                                </div>
                            <div class="mt-5">
                                <div class="Polaris-FormLayout">
                                    <div class="Polaris-FormLayout--grouped">
                                        <div class="Polaris-FormLayout__Items">
                                            <div class="Polaris-FormLayout__Item">
                                                <div class="">
                                                    <div class="Polaris-Select">
                                                        <select id="PolarisSelect2" class="Polaris-Select__Input" aria-invalid="false">
                                                            <option value="TITLE">Product title</option>
                                                            <option value="TYPE">Product type</option>
                                                            <option value="VENDOR">Product vendor</option>
                                                            <option value="PRICE">Product price</option>
                                                            <option value="STOCK">Product in stock</option>
                                                            <option value="TAG">Product tag</option>
                                                            <option value="COLLECTION">Collection</option>
                                                        </select>
                                                        <div class="Polaris-Select__Content" aria-hidden="true">
                                                            <span class="Polaris-Select__SelectedOption">Product title</span>
                                                            <span class="Polaris-Select__Icon">
                                                                <span class="Polaris-Icon">
                                                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M10 16l-4-4h8l-4 4zm0-12l4 4H6l4-4z"></path></svg>
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <div class="Polaris-Select__Backdrop"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Polaris-FormLayout__Item">
                                                <div class="">
                                                    <div class="Polaris-Select">
                                                        <select id="PolarisSelect3" class="Polaris-Select__Input" aria-invalid="false">
                                                            <option value="EQUALS">is equal to</option>
                                                            <option value="IS" disabled="">is</option>
                                                            <option value="NOT_EQUALS">is not equal to</option>
                                                            <option value="STARTS_WITH">starts with</option>
                                                            <option value="ENDS_WITH">ends with</option>
                                                            <option value="GREATER_THAN" disabled="">is greater than</option>
                                                            <option value="LESS_THAN" disabled="">is less than</option>
                                                            <option value="CONTAINS">contains</option>
                                                            <option value="NOT_CONTAINS">does not contain</option>
                                                        </select>
                                                        <div class="Polaris-Select__Content" aria-hidden="true">
                                                            <span class="Polaris-Select__SelectedOption">is not equal to</span>
                                                            <span class="Polaris-Select__Icon">
                                                                <span class="Polaris-Icon">
                                                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M10 16l-4-4h8l-4 4zm0-12l4 4H6l4-4z"></path></svg>
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <div class="Polaris-Select__Backdrop"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Polaris-FormLayout__Item">
                                                <div class="">
                                                    <div class="Polaris-Connected">
                                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                                            <div class="Polaris-TextField">
                                                                <input id="PolarisTextField3" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField3Label" aria-invalid="false" value="" />
                                                                <div class="Polaris-TextField__Backdrop"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Polaris-FormLayout__Items">
                                            <div class="Polaris-FormLayout__Item">
                                                <button class="Polaris-Button" type="button">
                                                    <span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Add another condition</span></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="Polaris-Card">
                            <div class="Polaris-Card__Section">
                                <div>
                                    <label class="Polaris-Choice" for="PolarisCheckbox5">
                                        <span class="Polaris-Choice__Control">
                                            <span class="Polaris-Checkbox">
                                                <input id="PolarisCheckbox5" type="checkbox" class="Polaris-Checkbox__Input" aria-invalid="false" aria-describedby="PolarisCheckbox5HelpText" role="checkbox" aria-checked="true" value="" />
                                                <span class="Polaris-Checkbox__Backdrop"></span>
                                                <span class="Polaris-Checkbox__Icon">
                                                    <span class="Polaris-Icon">
                                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                                            <path
                                                                d="M8.315 13.859l-3.182-3.417a.506.506 0 0 1 0-.684l.643-.683a.437.437 0 0 1 .642 0l2.22 2.393 4.942-5.327a.436.436 0 0 1 .643 0l.643.684a.504.504 0 0 1 0 .683l-5.91 6.35a.437.437 0 0 1-.642 0"
                                                            ></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="Polaris-Choice__Label">All products</span>
                                    </label>
                                    <div class="Polaris-Choice__Descriptions"><div class="Polaris-Choice__HelpText" id="PolarisCheckbox5HelpText">Enable "Request for quote" feature for all products.</div></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
