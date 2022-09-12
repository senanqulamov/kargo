@extends('userpanel.layout.layout')

@section('content')
    <style>
        .custom-file-upload {
            border: 1px solid transparent;
            border-radius: 5px;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background: #68D7FA;
            color: white;
            box-shadow: 0px 4px 10px 0px #00000026;
        }

        .custom-file-upload-div {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 10px;
            color: #405982;
        }

        .cont-for-file-input {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .remove_button_file_upld {
            all: unset;
        }

        .new_input_for_file {

            color: #405982;
            Font-size: 15px Line-height: 18px
        }

        .iconBG {
            width: 30px;
            height: 30px;
            background-color: #00d2ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .iconBGS {
            width: 30px;
            height: 30px;
            background-color: #DF8B7F;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .iconSize {
            width: 20px;
            height: 20px;
        }

        .textShipment {
            color: #405982;
        }

        .customerText {
            Font-size: 16px;
            Line-height: 19px;
            Line-height: 100%;
            color: #405982;
        }

        .customerCheck {
            Font-style: Bold;
            Font-size: 16px;
            Line-height: 19px;
            Line-height: 100%;
        }

        .btnText {

            Font-style: Bold;
            Font-size: 16px;
            Line-height: 19px;
            Line-height: 100%;
        }

        .productText {
            Font-size: 16px;
            Line-height: 20px;
            Line-height: 100%;
            color: #405982;
        }
    </style>
    <script src="https://unpkg.com/jsbarcode@latest/dist/JsBarcode.all.min.js"></script>

    <div class="drop__box">
        <div class="d-flex align-items-center">
            <div class="iconBG">
                <svg class="iconSize" width="17" height="17" viewBox="0 0 17 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.9123 13.2038L16.1369 12.0205C15.9768 11.776 15.6487 11.7077 15.4041 11.8679L11.0811 14.7005C10.8365 14.8607 10.7682 15.1888 10.9284 15.4333L11.7038 16.6166C11.864 16.8611 12.1921 16.9295 12.4366 16.7693L16.7597 13.9366C17.0042 13.7764 17.0726 13.4484 16.9123 13.2038Z"
                        fill="white" />
                    <path
                        d="M11.8174 13.1783L13.2328 12.2508C13.8041 11.8765 14.1955 11.3021 14.3347 10.6335C14.4664 10.001 14.3639 9.31744 13.9702 8.71055C13.768 8.40195 12.0795 5.82511 11.8811 5.52232C11.6194 5.12294 11.0835 5.01134 10.6841 5.27302C10.4242 5.44334 10.2871 5.72988 10.2946 6.01933L10.1406 5.78422C9.87888 5.3849 9.34287 5.27325 8.9436 5.53492C8.68364 5.70525 8.54661 5.99178 8.55408 6.28117L8.44745 6.11843C8.18572 5.71905 7.64988 5.60745 7.25049 5.86913C6.99053 6.03946 6.85345 6.32605 6.86098 6.61549L5.42761 4.42789C5.16593 4.02851 4.63009 3.91697 4.23065 4.17859C3.83127 4.44027 3.71967 4.97616 3.98135 5.37554L7.54576 10.8154L6.05377 10.3071C5.60135 10.153 5.11056 10.3946 4.9566 10.8466C4.80264 11.2986 5.04419 11.7898 5.49615 11.9438L9.69128 13.3731C9.97029 13.4892 10.2701 13.5502 10.5725 13.5502C11.0006 13.5502 11.4334 13.4299 11.8174 13.1783Z"
                        fill="white" />
                    <path
                        d="M5.86923 3.91283C6.04178 4.17622 6.39532 4.25 6.65871 4.07728C6.92215 3.90473 6.99577 3.55119 6.82316 3.28781C6.02029 2.06251 4.3704 1.71878 3.14517 2.52166C1.91993 3.32447 1.57625 4.97447 2.37901 6.19971C2.48844 6.36679 2.67063 6.45751 2.85652 6.45751C2.96366 6.45751 3.07212 6.42734 3.16849 6.36416C3.43187 6.19161 3.50555 5.83813 3.33294 5.57469C2.87482 4.87537 3.07092 3.93376 3.77019 3.47553C4.46939 3.01747 5.41106 3.21357 5.86923 3.91283Z"
                        fill="white" />
                    <path
                        d="M1.2146 4.03869C1.40294 3.13437 1.93222 2.3575 2.70487 1.8512C3.47753 1.3449 4.40106 1.16984 5.30549 1.35818C6.20981 1.54653 6.98668 2.07581 7.49298 2.84846C7.66559 3.11185 8.01901 3.18563 8.28245 3.01291C8.5459 2.84036 8.61951 2.48683 8.4469 2.22344C7.77364 1.19595 6.74063 0.492129 5.53803 0.241687C4.33554 -0.00881208 3.10734 0.22401 2.07985 0.897272C1.05237 1.57053 0.348541 2.60355 0.0980991 3.80615C-0.152343 5.00875 0.0804793 6.2369 0.753685 7.26432C0.863167 7.4314 1.0453 7.52212 1.23119 7.52212C1.33833 7.52212 1.44679 7.49196 1.54316 7.42878C1.8066 7.25617 1.88022 6.90269 1.70761 6.6393C1.20125 5.86659 1.02619 4.943 1.2146 4.03869Z"
                        fill="white" />
                </svg>
            </div>
            <span class="amazonHeaderText ms-2 amazonIcon">Amazon FBA</span>


        </div>


    </div>

    <section id="manual-order">
        <div class="variable variableManualOrder container py-4 row mx-auto">
            <form action="{{ route('userpanel.postAmazonorder') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 order-form-cont">
                    <!-- Customer -->
                    <ul class="list-group mb-5 order-form-div active-order-form-div">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="iconBG">
                                        <svg width="5" height="19" viewBox="0 0 5 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="iconSize">
                                            <path
                                                d="M4.49998 17.5001H4.49947C4.22335 17.5001 3.99945 17.2762 3.99945 17V6.50007C3.99945 6.22395 4.22335 6.00005 4.49947 6.00005H4.49998C4.77633 6.00005 5.00001 5.77615 5.00001 5.50002C5.00001 5.2239 4.77639 5 4.49998 5H0.500024C0.223674 5 0 5.2239 0 5.50002C0 5.77615 0.223617 6.00005 0.500024 6.00005H0.499514C0.775637 6.00005 0.999537 6.22395 0.999537 6.50007V17C0.999537 17.2762 0.775637 17.5001 0.499514 17.5001H0.500024C0.223674 17.5001 0 17.724 0 18.0001C0 18.2762 0.223617 18.5001 0.500024 18.5001H4.50004C4.77639 18.5001 5.00006 18.2762 5.00006 18.0001C5.00006 17.724 4.77639 17.5001 4.49998 17.5001Z"
                                                fill="white" />
                                            <path
                                                d="M2.50001 3.50002C3.32844 3.50002 4.00002 2.82845 4.00002 2.00001C4.00002 1.17158 3.32844 0.5 2.50001 0.5C1.67158 0.5 1 1.17158 1 2.00001C1 2.82845 1.67158 3.50002 2.50001 3.50002Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                    <span class="amazonHeaderText ms-2 amazonIcon">Amazon Warehouses</span>
                                </div>
                                <li class="list-group-item pb-4">
                                    <select class="selectpicker show-tick form-control" data-size="6"
                                        data-live-search="true" name="amazon_address" id="amazon-country"
                                        onchange="changeUserAddress(this)">
                                        <option selected disabled>Choose one of the following...</option>
                                        <option>Amazon.com Decd LLC - MDW2 - Joliet -
                                            250 Emerald Drive - 60433 - IL - US</option>
                                        <option>Amazon.com Decd LLC - ABE3 -
                                            Breinigsville - 650 Boulder Drive - 18031 - PA - US</option>
                                        <option>Amazon.com Decd LLC - AVP1 - Hazleton -
                                            550 Oak Ridge Road - 18202 - PA - US</option>
                                        <option>Amazon.com Decd LLC - BFI1 - Sumner -
                                            1800 140th Avenue E. - 98390 - WA - US</option>
                                        <option>Amazon.com Decd LLC - BNA1 - Lebanon -
                                            14840 Central Pike Suite 190 - 37090 - TN - US</option>
                                        <option>Amazon.com Decd LLC - BNA2 - Lebanon -
                                            500 Duke DR - 37090 - TN - US</option>
                                        <option>Amazon.com Decd LLC - BNA3 -
                                            Murfreesboro - Joe B Jackson Pkwy - 37127 - TN - US</option>
                                        <option>Amazon.com Decd LLC - CAE1 - West
                                            Columbia - 4400 12 Street Extension - 29172 - SC - US</option>
                                        <option>Amazon.com Decd LLC - CHA1 - Chattanooga
                                            - 7200 Discovery Drive - 37416-1757 - TN - US</option>
                                        <option>Amazon.com Decd LLC - CHA2 - Charleston
                                            - 225 Infinity Dr NW - 37310 - TN - US</option>
                                        <option>Amazon.com Decd LLC - CVG1 - Hebron -
                                            1155 Worldwide Blvd. - 41048 - KY - US</option>
                                        <option>Amazon.com Decd LLC - CVG2 - Hebron -
                                            1600 Worldwide Blvd - 41048 - KY - US</option>
                                        <option>Amazon.com Decd LLC - CVG3 - Hebron -
                                            3680 Langley Dr. - 41048 - KY - US</option>
                                        <option>Amazon.com Decd LLC - IND1 - Whitestown
                                            - 4255 Anson Blvd - 46075 - IN - US</option>
                                        <option>Amazon.com Decd LLC - IND2 - Plainfield
                                            - 715 Airtech Pkwy - 46168 - IN - US</option>
                                        <option>Amazon.com Decd LLC - IND3 - Plainfield
                                            - 715 Airtech Pkwy Suite 195 - 46168 - IN - US</option>
                                        <option>Amazon.com Decd LLC - IND4 -
                                            Indianapolis - 710 S. Girls School Rd - 46231 - IN - US</option>
                                        <option>Amazon.com Decd LLC - IND5 - Plainfield
                                            - 800 Perry Road - 46168 - IN - US</option>
                                        <option>Amazon.com Decd LLC - SDF8 -
                                            Jeffersonville - 900 Patrol Rd - 47130 - IN - US</option>
                                        <option>Amazon.com Decd LLC - LAS2 - Las Vegas -
                                            3837 Bay Lake Trail, Suite 111 North - 89030 - NV - US</option>
                                        <option>Amazon.com Decd LLC - LEX1 - Lexington -
                                            1850 Mercer Drive - 40511 - KY - US</option>
                                        <option>Amazon.com Decd LLC - LEX2 - Lexington -
                                            172 Trade St. - 40511 - KY - US</option>
                                        <option>Amazon.com Decd LLC - PHL1 - New Castle
                                            - 1 Centerpoint Blvd. - 19720 - DE - US</option>
                                        <option>Amazon.com Decd LLC - PHL3 - New Castle
                                            - 1600 Johnson Way - 19720 - DE - US</option>
                                        <option>Amazon.com Decd LLC - PHL4 - Carlisle -
                                            21 Roadway Dr - 17015 - PA - US</option>
                                        <option>Amazon.com Decd LLC - PHL5 - Lewisberry
                                            - 500 McCarthy Dr. Fairview Business Park - 17339 - PA - US</option>
                                        <option>Amazon.com Decd LLC - PHL6 - Carlisle -
                                            675 Allen Rd. - 17015 - PA - US</option>
                                        <option>Amazon.com Decd LLC - PHX3 - Phoenix -
                                            6835 West Buckeye Road - 85043 - AZ - US</option>
                                        <option>Amazon.com Decd LLC - PHX5 - Goodyear
                                            - 16920 W Commerce Drive - 85338 - AZ - US</option>
                                        <option>Amazon.com Decd LLC - PHX6 - Phoenix -
                                            4750 West Mohave St - 85043 - AZ - US</option>
                                        <option>Amazon.com Decd LLC - PHX7 - Phoenix -
                                            800 N 75th Ave - 85043 - AZ - US</option>
                                        <option>Amazon.com Decd LLC - RNO1 - Fernley -
                                            1600 East Newlands Drive - 89408 - NV - US</option>
                                        <option>Amazon.com Decd LLC - SDF1 -
                                            Campbellsville - 1051 S Columbia Ave - 42718 - KY - US</option>
                                        <option>Amazon.com Decd LLC - SDF2 -
                                            Louisville - 4360 Robards Ln - 40218 - KY - US</option>
                                        <option>Amazon.com Decd LLC - SDF4 -
                                            Shepherdsville - 376 Zappos.com Blvd - 40165 - KY - US</option>
                                        <option>Amazon.com Decd LLC - SDF6 -
                                            Shepherdsville - 271 Omega Pkwy - 40165 - KY - US</option>
                                        <option>Amazon.com Decd LLC - TUL1 -
                                            Coffeyville - 2654 North Highway 169 - 67337 - KS - US</option>
                                        <option>Amazon.com Decd LLC - ONT2 -
                                            San&nbsp;Bernardino - 1910&nbsp;E&nbsp;Central&nbsp;Ave - 92408-0123 - CA - US
                                        </option>
                                        <option>Amazon.com Decd LLC - PHL7 -
                                            Middletown - 560&nbsp;Merrimac&nbsp;Ave - 19709 - DE - US</option>
                                        <option>Amazon.com Decd LLC - RIC1 -
                                            Petersburg - 5000 Commerce Way - 23803 - VA - US</option>
                                        <option>Amazon.com Decd LLC - RIC2 - Chester -
                                            1901 Meadowville Technology Pkwy - 23836 - VA - US</option>
                                        <option>Amazon.com Decd LLC - GSP1 -
                                            Spartanburg - 402&nbsp;John&nbsp;Dodd&nbsp;Rd - 29303 - SC - US</option>
                                        <option>Amazon.com Decd LLC - ONT6 -
                                            Moreno&nbsp;Valley - 24208 San Michele Rd - 92551 - CA - US</option>
                                        <option>Amazon.com Decd LLC - EWR4 -
                                            Robbinsville - 50 New Canton Way - 08691-2350 - NJ - US</option>
                                        <option>Amazon.com Decd LLC - OAK4 - Tracy -
                                            1555 N. Chrisman Rd - 95304-9370 - CA - US</option>
                                        <option>Amazon.com Decd LLC - TPA2 - Lakeland
                                            - 1760 County Line Rd - 33811 - FL - US</option>
                                        <option>Amazon.com Decd LLC - TPA1 - Ruskin -
                                            3350 Laurel Ridge Ave. - 33570 - FL - US</option>
                                        <option>Amazon.com Decd LLC - DFW6 - Coppell -
                                            940 W Bethel Road - 75019-4424 - TX - US</option>
                                        <option>Amazon.com Decd LLC - MDT1 - Carlisle
                                            - 2 Ames Drive - 17015 - PA - US</option>
                                        <option>Amazon.com Decd LLC - ONT8 - Moreno
                                            Valley - 24300 Nandina Ave - 92551 - CA - US</option>
                                        <option>Amazon.com Decd LLC - MKE1 - KENOSHA -
                                            3501 120TH AVE - 53144 - WI - US</option>
                                        <option>Amazon.com Decd LLC - ONT9 - San
                                            Bernardino - 2125 W. San Bernardino Ave. - 92551 - CA - US</option>
                                        <option>Amazon.com Decd LLC - FTW1 - Dallas -
                                            33333 LBJ FWY - 75241-7203 - TX - US</option>
                                        <option>Amazon.com Decd LLC - SNA4 - LOS
                                            ANGELS - 2496 W Walnut Ave - 92376-3009 - CA - US</option>
                                        <option>Amazon.com Decd LLC - RNO4 - Reno -
                                            8000 NARTH VIRGINIASTREET RENO - 89506 - NV - US</option>
                                        <option>Amazon.com Decd LLC - SAT1 - San
                                            Antonio - 6000 enterprise avenue,schertz - 78154-1461 - TX - US</option>
                                        <option>Amazon.com Decd LLC - MKE5 - Kenosha -
                                            11211 Burlington Road - 53144 - WI - US</option>
                                        <option>Amazon.com Decd LLC - BFI3 - DuPont -
                                            2700 Center Drive - 98327 - WA - US</option>
                                        <option>Amazon.com Decd LLC - TFC1 - Phoenix -
                                            5050 West Mohave Street - 85043 - AZ - US</option>
                                        <option>Amazon.com Decd LLC - ONT5 - San
                                            Bernardino - 2020 E. Central Ave. Southgate Building 4 - 92408-2606 - CA - US
                                        </option>
                                        <option>Amazon.com Decd LLC - RNO2 - Reno -
                                            8000 North Virginia Street - 85906 - NV - US</option>
                                        <option>Amazon.com Decd LLC - OAK3 - Patterson
                                            - 255 Park Center Drive - 95363-8876 - CA - US</option>
                                        <option>Amazon.com Decd LLC - OAK5 - Newark -
                                            3811 Cherry Street - 94560 - CA - US</option>
                                        <option>Amazon.com Decd LLC - ABE5 -
                                            Harrisburg - 6455 Allentown Boulevard - 17112 - PA - US</option>
                                        <option>Amazon.com Decd LLC - MDT1 - Carlisle
                                            - 2 Ames Drive. Building #2 - 17015 - PA - US</option>
                                        <option>Amazon.com Decd LLC - PIT5 -
                                            Pittsburgh - 2250 Roswell Drive - 15205 - PA - US</option>
                                        <option>Amazon.com Decd LLC - XUSC - Carlisle
                                            - 40 Logistics Drive - 17013 - PA - US</option>
                                        <option>Amazon.com Decd LLC - BOS5 - Stoughton
                                            - 1000 Tech Center Drive - 02072-4744 - MA - US</option>
                                        <option>Amazon.com Decd LLC - EWR5 -
                                            Woodbridge (Avenel) - 301 Blair Road #100 - 7001 - NJ - US</option>
                                        <option>Amazon.com Decd LLC - EWR7 -
                                            Woodbridge (Avenel) - 301 Blair Road #100 - 7001 - NJ - US</option>
                                        <option>Amazon.com Decd LLC - EWR6 -
                                            Swedesboro - 2277 Center Square Rd - 8085 - NJ - US</option>
                                        <option>Amazon.com Decd LLC - DFW7 - Fort
                                            Worth - 700 Westport Parkway - 76177-4513 - TX - US</option>
                                        <option>Amazon.com Decd LLC - DFW8 - Dallas -
                                            2700 Regent Blvd - 75261 - TX - US</option>
                                        <option>Amazon.com Decd LLC - HOU1 - Humble -
                                            8120 Humble Westfield Rd - 77338 - TX - US</option>
                                        <option>Amazon.com Decd LLC - LAL1 - Lakeland
                                            - 1760 County Line Rd. - 33811 - FL - US</option>
                                        <option>Amazon.com Decd LLC - BWI2 - Baltimore
                                            - 2010 Broening Hwy - 21224 - MD - US</option>
                                        <option>Amazon.com Decd LLC - BWI1 - Baltimore
                                            - 45121 Global Plaza, Sterling - 21224 - MD - US</option>
                                        <option>Amazon.com Decd LLC - BWI5 - Baltimore
                                            - 5501 Holabird Ave, Baltimore - 21224 - MD - US</option>
                                        <option>Amazon.com Decd LLC - CMH1 - Etna -
                                            11999 National Road SW - 43018 - OH - US</option>
                                        <option>Amazon.com Decd LLC - BWI4 - Clear
                                            Brook - 165 Business Blvd - 22624-1568 - VA - US</option>
                                        <option>Amazon.com Decd LLC - MEM2 - Bayhalia
                                            - 191 Norfolk Southern Way - 38611-2306 - MS - US</option>
                                        <option>Amazon.com Decd LLC - MQJ1 -
                                            GREENFIELD - 4412 W CR 300 N - 46140 - IN - US</option>
                                        <option>Amazon.com Decd LLC - RDG1 - HAMBURG -
                                            3563 Mountain Road - 19526-7947 - PA - US</option>
                                        <option>Amazon.com Decd LLC - ICT2 - Park
                                            City - 7130 N Broadway Ave - 67219-1410 - KS - US</option>
                                    </select>
                                </li>
                                <li class="list-group-item mt-3">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <h6 class="customerText">Country<span class="red">*</span></h6>
                                                <input class="form-control mb-3 check-input" type="text" name="country"/>
                                                <h6 class="customerText">City<span class="red">*</span></h6>
                                                <input class="form-control mb-3 check-input" type="text"
                                                    placeholder="New York" aria-label="default input example" name="city"
                                                    id="locality-input" />
                                                <h6 class="customerText">State</h6>
                                                <input class="form-control mb-3 check-input" type="text"
                                                    placeholder="California" aria-label="default input example"
                                                    name="state" id="administrative_area_level_1-input" />
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <h6 class="customerText">Name<span class="red">*</span></h6>
                                                <input class="form-control mb-3 check-input" type="text"
                                                    placeholder="Emma John" aria-label="default input example"
                                                    name="name" />
                                                <h6 class="customerText">Adress<span class="red">*</span></h6>
                                                <input class="form-control mb-3 check-input" type="text"
                                                    placeholder="Bergen street 57" aria-label="default input example"
                                                    name="address" id="location-input" />
                                                <h6 class="customerText">ZIP Code<span class="red">*</span></h6>
                                                <input class="form-control mb-3 check-input" type="text"
                                                    placeholder="745844" aria-label="default input example" name="zipcode"
                                                    id="postal_code-input" />
                                            </div>
                                        </div>
                                    </fieldset>
                                </li>
                            </ul>
                        </li>
                        <li class="list-group-item row next-button-holder-hm">
                            <button type="button" class="btn btn-primary next-button-hm"
                                onclick="nextTo('common_info' , this)">Next</button>
                        </li>
                    </ul>
                    <!-- Common Information -->
                    <ul class="list-group mb-5 order-form-div" id="common_info">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="iconBG">
                                        <svg width="18" height="18" viewBox="0 0 13 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_126_1954)">
                                                <path
                                                    d="M1.28708 1.8792C1.21335 1.91954 1.16699 1.99744 1.16699 2.0823V8.57411C1.16699 8.64829 1.2027 8.71785 1.26252 8.76145L5.27213 11.6777C5.29393 11.6934 5.31804 11.7045 5.33984 11.7194V4.31549L1.52311 1.88615C1.45169 1.84118 1.36127 1.83885 1.28708 1.8792ZM2.12731 5.20903C2.19362 5.09914 2.33552 5.0639 2.44541 5.12974L4.76392 6.52084C4.87382 6.58668 4.90905 6.72905 4.84321 6.83895C4.80009 6.91128 4.72312 6.95117 4.64474 6.95117C4.6044 6.95117 4.56313 6.9405 4.52557 6.91824L2.20706 5.52714C2.09716 5.46128 2.06147 5.31847 2.12731 5.20903ZM2.12731 6.60013C2.19362 6.49069 2.33552 6.45452 2.44541 6.52084L4.76392 7.91194C4.87382 7.97778 4.90905 8.12015 4.84321 8.23005C4.80009 8.30238 4.72312 8.34227 4.64474 8.34227C4.6044 8.34227 4.56313 8.3316 4.52557 8.30934L2.20706 6.91824C2.09716 6.85238 2.06147 6.70957 2.12731 6.60013Z"
                                                    fill="white"></path>
                                                <path
                                                    d="M5.80469 4.53906V11.9541C6.02633 12.0329 6.25958 12.0765 6.50024 12.0765C6.7409 12.0765 6.97415 12.0324 7.19579 11.9541V4.53906C6.74785 4.69393 6.25262 4.69393 5.80469 4.53906Z"
                                                    fill="white"></path>
                                                <path
                                                    d="M11.7124 1.8791C11.6377 1.83876 11.5478 1.84108 11.4764 1.88699L7.65918 4.31585V11.7197C7.68144 11.7049 7.70554 11.6938 7.72689 11.678L11.7365 8.76181C11.7968 8.71775 11.8325 8.64819 11.8325 8.57401V2.0822C11.8325 1.99734 11.7861 1.91944 11.7124 1.8791Z"
                                                    fill="white"></path>
                                                <path
                                                    d="M6.49991 0.922852C5.60498 0.922852 4.87695 1.65085 4.87695 2.54581C4.87695 3.44074 5.60495 4.16877 6.49991 4.16877C7.39487 4.16877 8.12287 3.44077 8.12287 2.54581C8.12287 1.65085 7.39484 0.922852 6.49991 0.922852Z"
                                                    fill="white"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_126_1954">
                                                    <rect width="11.1538" height="11.1538" fill="white"
                                                        transform="translate(0.922852 0.922852)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <span class="amazonHeaderText ms-2 amazonIcon ">Common Information</span>
                                </div>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12 col-sm-4 mb-3">
                                            <h6 class="customerText">IOSS Number</h6>
                                            <input class="form-control check-input" type="text"
                                                placeholder="498980948" aria-label="default input example"
                                                name="ioss_number" />
                                        </div>
                                        <div class="col-12 col-sm-4 mb-3">
                                            <h6 class="customerText">Vat Number</h6>
                                            <input class="form-control check-input" type="text"
                                                placeholder="498980948" aria-label="default input example"
                                                name="vat_number" />
                                        </div>
                                        <div class="col-12 col-sm-4 mb-3">
                                            <h6 class="customerText">Currency unit<span class="red">*</span></h6>
                                            <select class="form-select check-input" name="currency_unit"
                                                onchange="changeCurrency(this)" required>
                                                <option value="EUR" data-currency="€" selected>EUR - Euro - €</option>
                                                <option value="USD" data-currency="$">USD - US dollar - $</option>
                                            </select>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="list-group-item row next-button-holder-hm">
                            <button type="button" class="btn btn-primary next-button-hm"
                                onclick="nextTo('order_info' , this)">Next</button>
                        </li>
                    </ul>
                    <!-- Order Information -->
                    <ul class="list-group mb-5 order-form-div" id="order_info">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">
                                <!-- Header -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="iconBG">
                                        <svg width="20" height="19" viewBox="0 0 14 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8499 4.90637C11.9533 4.90608 12.0529 4.94393 12.1288 5.01229C12.2047 5.08065 12.2511 5.17445 12.2589 5.27484V10.8816C12.2591 11.1911 12.136 11.4887 11.9156 11.7116C11.6951 11.9345 11.3945 12.0653 11.077 12.0767H2.85249C2.53474 12.0769 2.22929 11.957 2.00045 11.7423C1.77161 11.5276 1.63722 11.2348 1.62557 10.9255V5.30472C1.62527 5.20405 1.66413 5.107 1.73431 5.0331C1.80449 4.9592 1.9008 4.91392 2.00387 4.90637H11.8499ZM8.68037 6.56749L8.65584 6.58741L6.31446 9.05918L5.25112 8.0633C5.19722 8.01189 5.12586 7.98148 5.05051 7.97782C4.97517 7.97415 4.90105 7.99747 4.84215 8.04339L4.81966 8.0633L4.38205 8.44572C4.35427 8.4667 4.33145 8.49324 4.31511 8.52356C4.29878 8.55387 4.28933 8.58725 4.28739 8.62143C4.28545 8.65562 4.29107 8.68981 4.30388 8.72169C4.31668 8.75357 4.33637 8.7824 4.3616 8.80623L4.38205 8.82814L5.88094 10.2104C5.99743 10.3229 6.1545 10.3866 6.31855 10.3877C6.39989 10.3899 6.48079 10.3752 6.55588 10.3446C6.63097 10.3141 6.69853 10.2683 6.75411 10.2104L7.96467 8.9576L8.0526 8.86997L8.13848 8.78034L8.25095 8.66482L8.29389 8.621L8.37978 8.53336L9.529 7.35225C9.57096 7.30138 9.59517 7.2388 9.59811 7.17361C9.60105 7.10841 9.58257 7.04401 9.54535 6.98975L9.529 6.96983L9.09139 6.58741C9.03738 6.53546 8.9656 6.50471 8.88979 6.50104C8.81397 6.49736 8.73942 6.52102 8.68037 6.56749ZM11.8499 0.922852C12.1753 0.922852 12.4874 1.04876 12.7175 1.27287C12.9476 1.49699 13.0768 1.80096 13.0768 2.11791V3.31296C13.0768 3.41861 13.0338 3.51993 12.9571 3.59464C12.8804 3.66934 12.7763 3.71131 12.6679 3.71131H1.21659C1.10812 3.71131 1.0041 3.66934 0.927403 3.59464C0.850706 3.51993 0.807617 3.41861 0.807617 3.31296V2.11791C0.807617 1.80096 0.936882 1.49699 1.16697 1.27287C1.39707 1.04876 1.70914 0.922852 2.03454 0.922852H11.8499Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                    <span class="amazonHeaderText ms-2 amazonIcon">Order Information</span>
                                </div>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <input class="form-control check-input" type="text"
                                                aria-label="default input example" name="order_info" readonly />
                                        </div>
                                    </div>
                                </li>
                                <!-- Package -->
                                <li class="list-group-item paketYaradilanYer">
                                    <button type="button" class="btn btn-warning my-3 text-white"
                                        onclick="yeniPaketElaveEt()">
                                        + Add package
                                    </button>
                                    <!-- 2ci paket -->
                                </li>
                                <!-- Yekunlar Burada -->
                                <li class="list-group-item mt-3">
                                    <div class="row">
                                        <div class="col-12 row">
                                            <div
                                                class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">

                                                <div class="iconBG">
                                                    <svg class="iconSize" width="10" height="13"
                                                        viewBox="0 0 10 13" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.45215 13L3.93945 0.203125H5.20508L2.70898 13H1.45215ZM5.0293 13L7.52539 0.203125H8.78223L6.28613 13H5.0293ZM9.85449 5.08105H0.713867V3.85938H9.85449V5.08105ZM9.19531 9.39648H0.0458984V8.18359H9.19531V9.39648Z"
                                                            fill="white" />
                                                    </svg>

                                                </div>
                                                <div class="ms-2">
                                                    <h5>Total amount</h5>
                                                    <span class="totalText totalAmount">0</span>
                                                    <input type="hidden" name="total_count" value="">
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">

                                                <div class="iconBG">
                                                    <svg width="16" height="18" viewBox="0 0 16 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.134769 4.34731L0.178121 13.6648C0.178775 13.7846 0.244783 13.8944 0.350004 13.9511L7.79195 17.8477C7.84053 17.8736 7.89368 17.8867 7.94684 17.8867C7.94706 17.8867 7.94728 17.8867 7.94749 17.8867C7.96993 17.9122 7.99498 17.9361 8.02483 17.954C8.07624 17.9847 8.13419 18.0002 8.19236 18.0002C8.24595 18.0002 8.2991 17.9869 8.34746 17.9608L15.6953 13.9759C15.8007 13.9186 15.8667 13.8082 15.8667 13.6886V3.9944C15.8667 3.99157 15.8657 3.98896 15.8657 3.98591C15.8654 3.98351 15.8663 3.98133 15.8663 3.97872C15.8659 3.96935 15.8622 3.96085 15.8615 3.9517C15.8587 3.93384 15.8567 3.91598 15.8513 3.89877C15.8474 3.88679 15.8423 3.87611 15.8373 3.86457C15.8306 3.84932 15.8238 3.83429 15.8147 3.82034C15.8079 3.80945 15.7999 3.79965 15.7918 3.78963C15.7816 3.77699 15.7709 3.76523 15.7587 3.75412C15.7491 3.7454 15.7389 3.73756 15.728 3.72994C15.721 3.72514 15.7151 3.71839 15.7075 3.71403C15.7005 3.70968 15.6925 3.70793 15.6848 3.70423C15.6785 3.70096 15.6735 3.69639 15.6672 3.69356L8.0952 0.0256747C8.00697 -0.0115771 7.90697 -0.00809155 7.82114 0.0348242L0.33628 3.93667C0.226484 3.99201 0.157208 4.10441 0.156554 4.22706C0.156554 4.22902 0.157426 4.23077 0.157426 4.23251C0.144137 4.26889 0.134551 4.30723 0.134769 4.34731ZM14.7851 4.03035L8.18865 7.71849L1.20332 4.23164L7.97995 0.686403L14.7851 4.03035ZM8.51891 17.1249V8.28271L15.2132 4.54163V13.4929L8.51891 17.1249Z"
                                                            fill="white" />
                                                    </svg>


                                                </div>
                                                <div class="ms-2">
                                                    <h5>Total volume</h5>
                                                    <span class="totalText totalVolume">0</span><span> m3</span>
                                                    <input type="hidden" name="total_volume" value="">
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">

                                                <div class="iconBG">
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.018 13.2973H4.27109V6.47852H2.99609V13.9379C2.99609 14.291 3.28047 14.5754 3.63359 14.5754H5.02734V15.0191C5.02734 15.3723 5.31172 15.6566 5.66484 15.6566C6.01797 15.6566 6.30234 15.3723 6.30234 15.0191V14.5754H13.0805V15.0191C13.0805 15.3723 13.3648 15.6566 13.718 15.6566C14.0711 15.6566 14.3555 15.3723 14.3555 15.0191V14.5754H15.0148C15.368 14.5754 15.6523 14.291 15.6523 13.9379C15.6555 13.5848 15.3711 13.2973 15.018 13.2973Z"
                                                            fill="white" />
                                                        <path
                                                            d="M6.95 3.69062V1.85625C6.95 1.02187 6.27187 0.34375 5.4375 0.34375H1.85625C1.02188 0.34375 0.34375 1.02187 0.34375 1.85625V3.6875C0.34375 4.52187 1.02188 5.2 1.85625 5.2H5.4375C6.27187 5.20312 6.95 4.525 6.95 3.69062Z"
                                                            fill="white" />
                                                        <path
                                                            d="M6.75 6.94414V11.5379C6.75 11.891 7.03437 12.1754 7.3875 12.1754H13.7219C14.075 12.1754 14.3594 11.891 14.3594 11.5379V6.94414C14.3594 6.59102 14.075 6.30664 13.7219 6.30664H7.3875C7.03437 6.30664 6.75 6.59414 6.75 6.94414Z"
                                                            fill="white" />
                                                    </svg>


                                                </div>
                                                <div class="ms-2">
                                                    <h5>Total weight</h5>
                                                    <span class="totalText totalWeight">0</span><span> kg</span>
                                                    <input type="hidden" name="total_weight" value="">
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">

                                                <div class="iconBG">
                                                    <svg class="" width="12" height="16" viewBox="0 0 9 12"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.44531 7.94531H1.54688V6.11719H4.44531C4.89323 6.11719 5.25781 6.04427 5.53906 5.89844C5.82031 5.7474 6.02604 5.53906 6.15625 5.27344C6.28646 5.00781 6.35156 4.70833 6.35156 4.375C6.35156 4.03646 6.28646 3.72135 6.15625 3.42969C6.02604 3.13802 5.82031 2.90365 5.53906 2.72656C5.25781 2.54948 4.89323 2.46094 4.44531 2.46094H2.35938V12H0.015625V0.625H4.44531C5.33594 0.625 6.09896 0.786458 6.73438 1.10938C7.375 1.42708 7.86458 1.86719 8.20312 2.42969C8.54167 2.99219 8.71094 3.63542 8.71094 4.35938C8.71094 5.09375 8.54167 5.72917 8.20312 6.26562C7.86458 6.80208 7.375 7.21615 6.73438 7.50781C6.09896 7.79948 5.33594 7.94531 4.44531 7.94531Z"
                                                            fill="white" />
                                                    </svg>


                                                </div>
                                                <div class="ms-3">
                                                    <h5>Pricing weight:</h5>
                                                    <span class="totalText totalPricing">0</span> KGS
                                                    <input type="hidden" name="total_deci" value="">
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">

                                                <div class="iconBG">
                                                    <svg width="13" height="16" viewBox="0 0 13 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M7.32706 9.34761C7.32706 9.53475 7.48287 9.6865 7.67508 9.6865C7.86729 9.6865 8.0231 9.53475 8.0231 9.34761C8.0231 8.64633 7.52056 8.05756 6.84785 7.90377V7.67288C6.84785 7.48574 6.69204 7.33398 6.49983 7.33398C6.30762 7.33398 6.15181 7.48574 6.15181 7.67288V7.90377C5.4791 8.05753 4.97656 8.64629 4.97656 9.34761C4.97656 10.0489 5.4791 10.6376 6.15181 10.7914V12.367C5.86912 12.2388 5.6726 11.9596 5.6726 11.6365C5.6726 11.4493 5.51679 11.2976 5.32458 11.2976C5.13237 11.2976 4.97656 11.4493 4.97656 11.6365C4.97656 12.3378 5.4791 12.9265 6.15181 13.0803V13.3112C6.15181 13.4983 6.30762 13.6501 6.49983 13.6501C6.69204 13.6501 6.84785 13.4983 6.84785 13.3112V13.0803C7.52056 12.9266 8.0231 12.3378 8.0231 11.6365C8.0231 10.9352 7.52056 10.3464 6.84785 10.1926V8.61705C7.13054 8.74529 7.32706 9.02443 7.32706 9.34761ZM5.6726 9.34761C5.6726 9.02447 5.86912 8.74532 6.15181 8.61708V10.0781C5.86912 9.94989 5.6726 9.67074 5.6726 9.34761ZM7.32706 11.6365C7.32706 11.9596 7.13054 12.2388 6.84785 12.367V10.9059C7.13054 11.0342 7.32706 11.3133 7.32706 11.6365Z"
                                                            fill="white" />
                                                        <path
                                                            d="M7.45769 1.5166H5.54078C4.17319 1.5166 3.06055 2.6001 3.06055 3.93188V5.41051C3.06055 5.59094 3.15876 5.75784 3.31864 5.84908C3.40007 5.89554 3.49129 5.91886 3.58257 5.91886C3.67044 5.91886 3.75839 5.89727 3.83767 5.85402C4.64656 5.41288 5.56692 5.17971 6.49925 5.17971C7.43155 5.17971 8.35188 5.41288 9.16081 5.85402C9.32246 5.94221 9.51999 5.94027 9.67984 5.84908C9.83968 5.75784 9.93789 5.59094 9.93789 5.41051V3.93191C9.93786 2.6001 8.82525 1.5166 7.45769 1.5166ZM8.89381 4.60745C8.13517 4.31518 7.32099 4.16298 6.49922 4.16298C5.67742 4.16298 4.86323 4.31518 4.10459 4.60748V3.93185C4.10459 3.16068 4.74888 2.53327 5.54078 2.53327H7.45769C8.24956 2.53327 8.89385 3.16068 8.89385 3.93185V4.60745H8.89381Z"
                                                            fill="white" />
                                                        <path
                                                            d="M11.4962 6.44431V3.93202C11.4962 1.76391 9.68484 0 7.45844 0H5.54152C3.31512 0 1.50379 1.76391 1.50379 3.93202V6.44431C0.532597 7.57993 0 9.00985 0 10.4929C0 11.6074 0.301761 12.7034 0.872639 13.6624C1.42615 14.5924 2.21955 15.3758 3.16704 15.9279C3.24806 15.9751 3.3407 16 3.43508 16H9.56492C9.6593 16 9.75197 15.9751 9.83296 15.9279C10.7805 15.3758 11.5738 14.5924 12.1274 13.6624C12.6982 12.7034 13 11.6074 13 10.4929C13 9.00985 12.4674 7.57993 11.4962 6.44431ZM11.2241 13.1526C10.7828 13.894 10.1599 14.5246 9.41708 14.9833H3.58292C2.84012 14.5246 2.21722 13.894 1.7759 13.1526C1.29711 12.3483 1.04403 11.4285 1.04403 10.4929C1.04403 9.1931 1.53142 7.94195 2.41642 6.96991C2.50109 6.87692 2.54783 6.75695 2.54783 6.63268V3.93205C2.54783 2.32451 3.8908 1.01673 5.54152 1.01673H7.45844C9.10916 1.01673 10.4521 2.32455 10.4521 3.93205V6.63268C10.4521 6.75695 10.4989 6.87692 10.5835 6.96991C11.4685 7.94195 11.9559 9.19313 11.9559 10.4929C11.9559 11.4285 11.7029 12.3482 11.2241 13.1526Z"
                                                            fill="white" />
                                                    </svg>


                                                </div>
                                                <div class="ms-3">
                                                    <h5>Total worth:</h5>
                                                    <span class="totalText totalWorth">0</span><span
                                                        class="total-worth-currency"> €</span>
                                                    <input type="hidden" name="total_worth" value="">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-primary btnText"
                                                onclick="yekunHesabla()">
                                                <i class="fa-solid fa-tag me-1"></i> Get a quote
                                            </button>
                                        </div> --}}
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="list-group-item row next-button-holder-hm">
                            <button type="button" class="btn btn-outline-primary next-button-with-quote next-button-hm"
                                onclick="yekunHesabla('next')">Get Quote
                            </button>
                            <button style="display: none" type="button"
                                class="btn btn-outline-primary next-button-get-quote next-button-hm"
                                onclick="yekunHesabla('quote')">Get Quote
                            </button>
                        </li>
                    </ul>
                    <!-- Shipment definition -->
                    <ul class="list-group mb-5 order-form-div" id="shipment_def">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">

                                <div class="d-flex align-items-center mb-3">
                                    <div class="iconBG">
                                        <svg class="" width="18" height="18" viewBox="0 0 18 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.7331 10.2845C17.625 9.93554 17.2985 9.757 17.0052 9.88553L9.60305 13.1193C9.1414 12.3165 8.34204 11.8762 7.5281 11.9749L4.10487 0.935666L0.692375 0.0169193C0.38811 -0.0656133 0.0832944 0.161825 0.0141382 0.524279C-0.0550181 0.886733 0.136221 1.24743 0.441589 1.32951L3.25354 2.08675L6.46573 12.4457C5.65464 13.1222 5.2922 14.3821 5.65107 15.5383C6.07872 16.9171 7.36697 17.6239 8.52878 17.1163C9.49972 16.6919 10.0723 15.5536 9.98538 14.3863L17.397 11.1487C17.6906 11.02 17.8412 10.6333 17.7331 10.2845ZM8.17008 15.9598C7.54645 16.2326 6.85463 15.8528 6.62504 15.1129C6.39562 14.3722 6.71498 13.5515 7.33878 13.2787C7.9624 13.0062 8.65443 13.3857 8.88402 14.1257C9.11362 14.8661 8.7937 15.6871 8.17008 15.9598Z"
                                                fill="white" />
                                            <path
                                                d="M16.2209 8.29323L13.8448 0.629883L10.8866 1.92233L11.5404 4.03056L10.3482 4.55115L9.69454 2.44316L6.73633 3.73537L9.11249 11.3987L16.2209 8.29323ZM14.5884 6.88348L14.8494 7.72553L12.2083 8.87934L11.9473 8.03729L14.5884 6.88348Z"
                                                fill="white" />
                                        </svg>

                                    </div>
                                    <span class="amazonHeaderText ms-2 amazonIcon">Shipment
                                        definition</span>
                                </div>
                                <li class="list-group-item">
                                    <h5 class="textShipment">Select the cargo</h5>
                                    <div class="cargo-company-labels-holder">
                                        @foreach ($cargo_companies as $company)
                                            <label for="cargo_company_input_{{ $company->id }}"
                                                class="cargo-company-label">
                                                <div class="list-group list-group-horizontal">
                                                    <div
                                                        class="list-group-item w-25 text-center d-flex align-items-center">
                                                        <img style="height:48px;"
                                                            src="{{ asset('/') }}backend/assets/img/companies/cargo/{{ $company->logo == null ? 'user.png' : $company->logo }}" />
                                                    </div>
                                                    <div class="list-group-item w-50 text-left d-flex align-items-center ">
                                                        {{ $company->name }}</div>
                                                    <div class="list-group-item d-flex d-flex align-items-center">
                                                        <span class="me-2 textShipment"
                                                            id="cargo_company_{{ $company->id }}">0
                                                            €</span>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="cargo_company"
                                                                id="cargo_company_input_{{ $company->id }}"
                                                                data-price="0" value="{{ $company->id }}" />
                                                            <input type="hidden"
                                                                name="company_value[{{ $company->id }}]" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                </li>
                                <!-- Footer -->
                                <li class="list-group-item">
                                    <h5 class="textShipment">Additional Services</h5>
                                    <div class="row">
                                        @foreach ($additional_services as $service)
                                            <label for="{{ $service->slug }}" class="col-12 col-md-4">
                                                <div>
                                                    <ul class="list-group list-group-horizontal mb-2">
                                                        <li class="list-group-item w-75 d-flex text-left">
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input cargo_price_input {{ $service->slug }}_input"
                                                                    type="checkbox" data-price="{{ $service->price }}"
                                                                    name="additional_services[{{ $service->slug }}]"
                                                                    id="{{ $service->slug }}" />
                                                            </div>
                                                            {{ $service->title }}
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <span
                                                                class="me-2 {{ $service->slug }}_span">{{ $service->price }}
                                                                €</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </label>
                                        @endforeach
                                        <label for="insurance" class="col-12 col-md-4">
                                            <div>
                                                <ul class="list-group list-group-horizontal mb-2">
                                                    <li class="list-group-item w-75 d-flex text-left">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input cargo_price_input insurance_input"
                                                                type="checkbox" data-price="0"
                                                                name="additional_services[insurance]" id="insurance" />
                                                        </div>
                                                        Insurance
                                                    </li>
                                                    <li class="list-group-item d-flex">
                                                        <span class="me-2 insurance_input_span">0
                                                            €</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="list-group-item row next-button-holder-hm">
                            <button type="button" class="btn btn-primary next-button-hm"
                                onclick="nextTo('product_content' , this)">Next</button>
                        </li>
                    </ul>
                    <!-- Product Content -->
                    <ul class="list-group mb-5 order-form-div" id="product_content">
                        <li class="list-group-item pt-4">

                            <div class="d-flex align-items-center mb-3">
                                <div class="iconBG">

                                    <svg class="" width="13" height="12" viewBox="0 0 13 12"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.3159 0H0.684214C0.306391 0 0 0.312118 0 0.69716V3.86951C0 4.25456 0.306391 4.56667 0.684214 4.56667H0.939768V11.3028C0.939768 11.6879 1.24609 12 1.62398 12H11.3758C11.7537 12 12.06 11.6879 12.06 11.3028V4.56661H12.3158C12.6936 4.56661 13 4.25449 13 3.86945V0.69716C13.0001 0.312118 12.6937 0 12.3159 0ZM7.93928 6.22299H5.06065C4.75885 6.22299 4.51328 5.97278 4.51328 5.66526C4.51328 5.35774 4.75885 5.10753 5.06065 5.10753H7.93928C8.24109 5.10753 8.48665 5.35774 8.48665 5.66526C8.48665 5.97278 8.24109 6.22299 7.93928 6.22299ZM11.6316 3.17229H11.3759H1.62398H1.36843V1.39432H11.6316V3.17229Z"
                                            fill="white" />
                                    </svg>






                                </div>
                                <span class="amazonHeaderText ms-2 amazonIcon">Product Content</span>
                            </div>
                            <div class="row">
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5 class="productText">Does the product contain a battery?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="battery"
                                                id="battery_yes" value="yes" />
                                            <label class="form-check-label" for="battery_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="battery"
                                                id="battery_no" value="no" checked />
                                            <label class="form-check-label" for="battery_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5 class="productText">Does the product contain
                                            cosmetics/liquids?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="liquid"
                                                id="liquid_yes" value="yes" />
                                            <label class="form-check-label" for="liquid_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="liquid" id="liquid_no"
                                                value="no" checked />
                                            <label class="form-check-label" for="liquid_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5 class="productText">Does the product contain food?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="food" id="food_yes"
                                                value="yes" />
                                            <label class="form-check-label" for="food_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="food" id="food_no"
                                                checked value="no" />
                                            <label class="form-check-label" for="food_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5 class="productText">Does the product contain dangerous substances?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dangerous"
                                                id="dangerous_yes" value="yes" />
                                            <label class="form-check-label" for="dangerous_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dangerous"
                                                id="dangerous_no" value="no" checked />
                                            <label class="form-check-label" for="dangerous_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col row productContentFooter m-2 rounded">
                                    <span class="col-12">*If your cargo includes batteries and derivatives,
                                        you
                                        can
                                        send it together with your
                                        <span class="rengliSoz">MSDS</span> document.</span>
                                    <span class="col-12">*When sending your cargo containing
                                        cosmetics/liquid,
                                        you
                                        send it together with your
                                        <span class="rengliSoz">MSDS</span> document.</span>
                                    <span class="col-12">*If you are selling dietary supplements, food,
                                        drugs,
                                        blood
                                        products, biological medical products, radiation-emitting
                                        devices, medical devices, cosmetics and veterinary
                                        equipment, you must obtain
                                        <span class="rengliSoz">FDA</span> certification for
                                        these.</span>
                                    <span class="col-12">
                                        *You must obtain an
                                        <span class="rengliSoz">MSDS</span> certificate for your
                                        products that contain flammable, harmful, irritating
                                        chemicals that may harm nature.</span>
                                    <span class="col-12">*I do according to the Amazon rules
                                        <a class="rengliSoz" href="https://sellercentral.amazon.com/help/hub/reference/external/G200141500">Rules</a>
                                        <input type="checkbox">
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item row next-button-holder-hm">
                            <button type="button" class="btn btn-primary next-button-hm"
                                onclick="nextTo('attachment' , this)">Next</button>
                        </li>
                    </ul>
                    <!-- Attachment of documents -->
                    <ul class="list-group mb-5 order-form-div" id="attachment">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">

                                <div class="d-flex align-items-center mb-3">
                                    <div class="iconBG">

                                        <svg class="iconSize" width="13" height="17" viewBox="0 0 13 17"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.09956 1.92634C5.6064 1.25086 4.89125 0.822701 4.08579 0.720708C3.28032 0.618714 2.48103 0.855104 1.83506 1.38634C1.1891 1.91758 0.773861 2.68001 0.665816 3.53326C0.55777 4.38652 0.769859 5.22839 1.26302 5.90387L6.43555 12.9886C7.10441 13.9046 8.36093 14.0636 9.23677 13.3434C10.1126 12.623 10.2812 11.2919 9.61253 10.3759L4.49108 3.36135C4.29414 3.0916 3.92523 3.04489 3.66736 3.25705C3.4094 3.4692 3.35992 3.85989 3.55687 4.12964L8.67821 11.1443C8.95358 11.5215 8.88415 12.0698 8.52345 12.3664C8.16276 12.6631 7.64523 12.5975 7.36976 12.2204L2.19722 5.13568C1.89453 4.72109 1.76446 4.20444 1.83075 3.68088C1.89706 3.15722 2.15191 2.68931 2.54827 2.36334C3.36666 1.69031 4.54054 1.83895 5.16534 2.69473L10.585 10.118C11.5573 11.4497 11.3122 13.3853 10.0386 14.4326C9.42175 14.94 8.65832 15.1657 7.88906 15.0683C7.11981 14.9709 6.43676 14.562 5.96578 13.9169L1.79884 8.20933C1.60189 7.93958 1.23299 7.89287 0.975122 8.10503C0.717155 8.31718 0.667683 8.70787 0.864629 8.97762L5.03159 14.6851C5.69311 15.5912 6.65242 16.1655 7.73281 16.3023C8.8132 16.4391 9.88548 16.122 10.7519 15.4094C11.6183 14.6968 12.1754 13.6741 12.3203 12.5295C12.4652 11.385 12.1808 10.2556 11.5192 9.34961L6.09956 1.92634Z"
                                                fill="white" />
                                        </svg>




                                    </div>
                                    <span class="amazonHeaderText ms-2 amazonIcon">Attachment of documents</span>
                                </div>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="cont-for-file-input ">
                                            <p class="variable-footer-text">(PDF, Maks. 5.0. MB)</p>
                                            <div class="custom-file-upload-div">
                                                <label for="CustomFileUpload"
                                                    class="custom-file-upload label-for-hidden-input">
                                                    <input type="file" name="document[]" id="CustomFileUpload"
                                                        hidden />
                                                    Custom Upload
                                                </label>
                                                <h6 class="ms-2" id="CustomFileUploadText">No file chosen, yet.
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Elave olunan fayllar li teqinin icinde olacaq -->
                                <li class="list-group-item added-files-after-upload">
                                </li>
                            </ul>
                        </li>
                        <li class="list-group-item row next-button-holder-hm">
                            <button type="button" class="btn btn-primary next-button-hm"
                                onclick="nextTo('submit_button_form' , this)">Ready ?</button>
                        </li>
                    </ul>
                </div>
                <div class="total_cargo_price" onclick="ScrollToBottom()">
                    <span>Total price: </span> <span id="total_cargo_price_span">0</span>
                    <span>€</span>
                    <input type="hidden" name="total_cargo_price" id="total_cargo_price" value="0">
                </div>

                <div class="order-form-div next-button-holder-hm" id="submit_button_form">
                    <button class="btn btn-success" type="submit">Submit order</button>
                </div>
            </form>
        </div>
    </section>

    <input type="text" id="ajax_url" hidden value="{{ route('userpanel.getquote.manualorder') }}">

    <script>
        setTimeout(() => {
            var select_buttons = document.querySelectorAll('.dropdown-toggle');
            console.log(select_buttons);
            select_buttons.forEach(element => {
                element.setAttribute('id', 'custom_select_button');
            });
        }, 1000);
    </script>
    <script>
        $('#CustomFileUpload').change(function(e) {
            var fileName = e.target.files[0].name;
            $('#CustomFileUploadText').html(fileName);
        });
    </script>
    {{-- File upload --}}
    <script>
        $("#CustomFileUpload").change(function() {

            var input_value = this.value;
            var file_name = this.files[0].name;
            var file_id = Math.random().toString(36).substr(2, 9);

            var $element = $(`
                <div class="custom-file-upload-div" id="file-upload-div-` + file_id + `">
                    <label class="label-for-hidden-input new_input_for_file">
                        ${file_name}
                    </label>
                    <select style="width:25%;" class="form-select" name="file_type[` + file_id + `]">
                        <option value="FDA">FDA</option>
                        <option value="MSDS">MSDS</option>
                        <option value="FNSKU">FNSKU</option>
                        <option value="other">other</option>
                    </select>
                    <button type="button" class="remove_button_file_upld" onclick="removeFileLabel(this)">
                        <div class="d-flex align-items-center">
                            <div class="iconBGS">
                                <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.2545 1.62215H8.10439L8.06407 1.47955C7.84453 0.697352 7.23035 0.171875 6.53589 0.171875H5.0126C4.31817 0.171875 3.70397 0.697352 3.48403 1.47955L3.44412 1.62215H1.29401C1.06878 1.62215 0.886719 1.83872 0.886719 2.10557C0.886719 2.37242 1.06878 2.58899 1.29401 2.58899H3.73778H7.81072H10.2545C10.4797 2.58899 10.6618 2.37242 10.6618 2.10557C10.6618 1.83872 10.4797 1.62215 10.2545 1.62215ZM4.31777 1.62215C4.45667 1.32727 4.72017 1.13874 5.01262 1.13874H6.53591C6.82835 1.13874 7.09227 1.32727 7.23077 1.62215H4.31777Z" fill="white"/>
                                    <path d="M9.43984 3.07227H2.10852C1.9961 3.07227 1.88858 3.12738 1.8116 3.22455C1.73462 3.3222 1.6947 3.45273 1.70203 3.58568L2.06168 10.4109C2.10119 11.1757 2.63842 11.7742 3.28357 11.7742H8.26481C8.90996 11.7742 9.44719 11.1757 9.48669 10.4114L9.84633 3.58568C9.85366 3.45273 9.81374 3.3222 9.73676 3.22455C9.65978 3.12738 9.55226 3.07227 9.43984 3.07227ZM7.81067 9.84045H3.73771C3.51249 9.84045 3.33042 9.62387 3.33042 9.35701C3.33042 9.09015 3.51247 8.87356 3.73771 8.87356H7.81067C8.03589 8.87356 8.21796 9.09013 8.21796 9.35699C8.21796 9.62385 8.03589 9.84045 7.81067 9.84045ZM7.81067 7.90667H3.73771C3.51249 7.90667 3.33042 7.69009 3.33042 7.42323C3.33042 7.15637 3.51249 6.9398 3.73771 6.9398H7.81067C8.03589 6.9398 8.21796 7.15637 8.21796 7.42323C8.21796 7.69009 8.03589 7.90667 7.81067 7.90667Z" fill="white"/>
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
                <br>
            `).append($(this).clone());

            $('.added-files-after-upload').append($element);

            var div = document.querySelector('#file-upload-div-' + file_id + '');
            var new_file_input_hidden = div.querySelector('#CustomFileUpload');
            new_file_input_hidden.setAttribute('name', 'document[' + file_id + ']');
            // console.log(div , new_file_input_hidden);
        });

        function removeFileLabel(remove_button) {
            remove_button.parentNode.remove();
        }
    </script>
    {{-- User Address --}}
    <script>
        document.querySelector('input[name="country"]').setAttribute('readonly' ,'');
        document.querySelector('input[name="state"]').setAttribute('readonly' ,'');
        document.querySelector('input[name="city"]').setAttribute('readonly' ,'');
        document.querySelector('input[name="address"]').setAttribute('readonly' ,'');
        document.querySelector('input[name="zipcode"]').setAttribute('readonly' ,'');
        document.querySelector('input[name="name"]').setAttribute('readonly' ,'');

        function changeUserAddress(select) {
            var options = select.options;
            var address_data = options[select.selectedIndex].text;
            address_data = address_data.split('-');
            var address = address_data[3];
            var country = "United States";
            var city = address_data[2];
            var state = address_data[5];
            var zipcode = address_data[4];
            var name = address_data[0] + " - " + address_data[1];

            document.querySelector('input[name="country"]').value = country;
            document.querySelector('input[name="state"]').value = state;
            document.querySelector('input[name="city"]').value = city;
            document.querySelector('input[name="address"]').value = address;
            document.querySelector('input[name="zipcode"]').value = zipcode;
            document.querySelector('input[name="name"]').value = name;
        }
    </script>
    <script>
        var additional = document.querySelectorAll('.cargo_price_input');
        var company = document.querySelector('input[name="cargo_company"]:checked');
        var companies = document.querySelectorAll('input[name="cargo_company"]');

        var total_additional = 0;
        var helper_additional = 0;
        var company_price = 0;

        additional.forEach(element => {
            element.addEventListener('change', function() {
                additional.forEach(input => {
                    if ($(input).is(":checked")) {
                        helper_additional += parseFloat(input.getAttribute('data-price'));
                    }
                });
                total_additional = helper_additional;
                helper_additional = 0;
                document.querySelector('input[name="total_cargo_price"]').value = (total_additional +
                    company_price).toFixed(2);
                document.querySelector('#total_cargo_price_span').innerHTML = (total_additional +
                    company_price).toFixed(2);
            });
        });

        companies.forEach(element => {
            element.addEventListener('change', function() {
                company_price = parseFloat(document.querySelector('input[name="cargo_company"]:checked')
                    .getAttribute('data-price'));

                document.querySelector('input[name="total_cargo_price"]').value = (total_additional +
                    company_price).toFixed(2);
                document.querySelector('#total_cargo_price_span').innerHTML = (total_additional +
                    company_price).toFixed(2);
            });
        });

        function changeCurrency(select) {
            var options = select.options;
            var currency = options[options.selectedIndex].getAttribute('data-currency');

            document.querySelector('.total-worth-currency').innerHTML = " " + currency;
        }
    </script>
    <script src="{{ asset('/') }}frontend/userpanel/js/order_calculator_amazon.js"></script>
    <script src="{{ asset('/') }}frontend/userpanel/js/morder.js"></script>
@endsection
