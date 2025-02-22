<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');

  body {
    background: url('http://all4desktop.com/data_images/original/4236532-background-images.jpg');
    font-family: 'Roboto Condensed', sans-serif;
    color: #262626;
    margin: 5% 0;
  }

  .container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }

  @media (min-width: 1200px) {
    .container {
      max-width: 1140px;
    }
  }

  .d-flex {
    display: flex;
    flex-direction: row;
    background: #f6f6f6;
    border-radius: 0 0 5px 5px;
    padding: 25px;
  }

  form {
    flex: 4;
  }

  .Yorder {
    flex: 2;
  }

  .title {
    background: -webkit-gradient(linear, left top, right bottom, color-stop(0, #5195A8), color-stop(100, #70EAFF));
    background: -moz-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
    background: -ms-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
    background: -o-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
    background: linear-gradient(to bottom right, #5195A8 0%, #70EAFF 100%);
    border-radius: 5px 5px 0 0;
    padding: 20px;
    color: #f6f6f6;
  }

  h2 {
    margin: 0;
    padding-left: 15px;
  }

  .required {
    color: red;
  }

  label,
  table {
    display: block;
    margin: 15px;
  }

  label>span {
    float: left;
    width: 25%;
    margin-top: 12px;
    padding-right: 10px;
  }

  input[type="text"],
  input[type="tel"],
  input[type="email"],
  select {
    width: 70%;
    height: 30px;
    padding: 5px 10px;
    margin-bottom: 10px;
    border: 1px solid #dadada;
    color: #888;
  }

  select {
    width: 72%;
    height: 45px;
    padding: 5px 10px;
    margin-bottom: 10px;
  }

  .Yorder {
    margin-top: 15px;
    height: 600px;
    padding: 20px;
    border: 1px solid #dadada;
  }

  table {
    margin: 0;
    padding: 0;
  }

  th {
    border-bottom: 1px solid #dadada;
    padding: 10px 0;
  }

  tr>td:nth-child(1) {
    text-align: left;
    color: #2d2d2a;
  }

  tr>td:nth-child(2) {
    text-align: right;
    color: #52ad9c;
  }

  td {
    border-bottom: 1px solid #dadada;
    padding: 25px 25px 25px 0;
  }

  p {
    display: block;
    color: #888;
    margin: 0;
    padding-left: 25px;
  }

  .Yorder>div {
    padding: 15px 0;
  }

  button {
    width: 100%;
    margin-top: 10px;
    padding: 10px;
    border: none;
    border-radius: 30px;
    background: #52ad9c;
    color: #fff;
    font-size: 15px;
    font-weight: bold;
  }

  button:hover {
    cursor: pointer;
    background: #428a7d;
  }
</style>

<body>
  <?php
  if (isset($_GET['error']) && !empty($_GET['error'])) {
    echo $_GET['error'];
  }
  ?>

  <div class="container">
    <div class="title">
      <h2>Create Package </h2>
    </div>
    <div class="d-flex">
      <form id="register" method="post" enctype="multipart/form-data">
        <label>
          <span class="nationalparkname">National Park Name <span class="required">*</span></span>
          <input type="text" id="nationalparkname" name="nationalparkname" placeholder="Create National Park">

        </label><span class='nationalparkname_error' style="color:red"></span>

        <label for="nationalparklocation">
          <span>National Park Location <span class="required">*</span></span>
        </label>
        <select id="nationalparklocation" name="nationalparklocation" required>

          <option value="select">Select a country...</option>
          <option value="AFG">Afghanistan</option>
          <option value="ALA">Åland Islands</option>
          <option value="ALB">Albania</option>
          <option value="DZA">Algeria</option>
          <option value="ASM">American Samoa</option>
          <option value="AND">Andorra</option>
          <option value="AGO">Angola</option>
          <option value="AIA">Anguilla</option>
          <option value="ATA">Antarctica</option>
          <option value="ATG">Antigua and Barbuda</option>
          <option value="ARG">Argentina</option>
          <option value="ARM">Armenia</option>
          <option value="ABW">Aruba</option>
          <option value="AUS">Australia</option>
          <option value="AUT">Austria</option>
          <option value="AZE">Azerbaijan</option>
          <option value="BHS">Bahamas</option>
          <option value="BHR">Bahrain</option>
          <option value="BGD">Bangladesh</option>
          <option value="BRB">Barbados</option>
          <option value="BLR">Belarus</option>
          <option value="BEL">Belgium</option>
          <option value="BLZ">Belize</option>
          <option value="BEN">Benin</option>
          <option value="BMU">Bermuda</option>
          <option value="BTN">Bhutan</option>
          <option value="BOL">Bolivia, Plurinational State of</option>
          <option value="BES">Bonaire, Sint Eustatius and Saba</option>
          <option value="BIH">Bosnia and Herzegovina</option>
          <option value="BWA">Botswana</option>
          <option value="BVT">Bouvet Island</option>
          <option value="BRA">Brazil</option>
          <option value="IOT">British Indian Ocean Territory</option>
          <option value="BRN">Brunei Darussalam</option>
          <option value="BGR">Bulgaria</option>
          <option value="BFA">Burkina Faso</option>
          <option value="BDI">Burundi</option>
          <option value="KHM">Cambodia</option>
          <option value="CMR">Cameroon</option>
          <option value="CAN">Canada</option>
          <option value="CPV">Cape Verde</option>
          <option value="CYM">Cayman Islands</option>
          <option value="CAF">Central African Republic</option>
          <option value="TCD">Chad</option>
          <option value="CHL">Chile</option>
          <option value="CHN">China</option>
          <option value="CXR">Christmas Island</option>
          <option value="CCK">Cocos (Keeling) Islands</option>
          <option value="COL">Colombia</option>
          <option value="COM">Comoros</option>
          <option value="COG">Congo</option>
          <option value="COD">Congo, the Democratic Republic of the</option>
          <option value="COK">Cook Islands</option>
          <option value="CRI">Costa Rica</option>
          <option value="CIV">Côte d'Ivoire</option>
          <option value="HRV">Croatia</option>
          <option value="CUB">Cuba</option>
          <option value="CUW">Curaçao</option>
          <option value="CYP">Cyprus</option>
          <option value="CZE">Czech Republic</option>
          <option value="DNK">Denmark</option>
          <option value="DJI">Djibouti</option>
          <option value="DMA">Dominica</option>
          <option value="DOM">Dominican Republic</option>
          <option value="ECU">Ecuador</option>
          <option value="EGY">Egypt</option>
          <option value="SLV">El Salvador</option>
          <option value="GNQ">Equatorial Guinea</option>
          <option value="ERI">Eritrea</option>
          <option value="EST">Estonia</option>
          <option value="ETH">Ethiopia</option>
          <option value="FLK">Falkland Islands (Malvinas)</option>
          <option value="FRO">Faroe Islands</option>
          <option value="FJI">Fiji</option>
          <option value="FIN">Finland</option>
          <option value="FRA">France</option>
          <option value="GUF">French Guiana</option>
          <option value="PYF">French Polynesia</option>
          <option value="ATF">French Southern Territories</option>
          <option value="GAB">Gabon</option>
          <option value="GMB">Gambia</option>
          <option value="GEO">Georgia</option>
          <option value="DEU">Germany</option>
          <option value="GHA">Ghana</option>
          <option value="GIB">Gibraltar</option>
          <option value="GRC">Greece</option>
          <option value="GRL">Greenland</option>
          <option value="GRD">Grenada</option>
          <option value="GLP">Guadeloupe</option>
          <option value="GUM">Guam</option>
          <option value="GTM">Guatemala</option>
          <option value="GGY">Guernsey</option>
          <option value="GIN">Guinea</option>
          <option value="GNB">Guinea-Bissau</option>
          <option value="GUY">Guyana</option>
          <option value="HTI">Haiti</option>
          <option value="HMD">Heard Island and McDonald Islands</option>
          <option value="VAT">Holy See (Vatican City State)</option>
          <option value="HND">Honduras</option>
          <option value="HKG">Hong Kong</option>
          <option value="HUN">Hungary</option>
          <option value="ISL">Iceland</option>
          <option value="IND">India</option>
          <option value="IDN">Indonesia</option>
          <option value="IRN">Iran, Islamic Republic of</option>
          <option value="IRQ">Iraq</option>
          <option value="IRL">Ireland</option>
          <option value="IMN">Isle of Man</option>
          <option value="ISR">Israel</option>
          <option value="ITA">Italy</option>
          <option value="JAM">Jamaica</option>
          <option value="JPN">Japan</option>
          <option value="JEY">Jersey</option>
          <option value="JOR">Jordan</option>
          <option value="KAZ">Kazakhstan</option>
          <option value="KEN">Kenya</option>
          <option value="KIR">Kiribati</option>
          <option value="PRK">Korea, Democratic People's Republic of</option>
          <option value="KOR">Korea, Republic of</option>
          <option value="KWT">Kuwait</option>
          <option value="KGZ">Kyrgyzstan</option>
          <option value="LAO">Lao People's Democratic Republic</option>
          <option value="LVA">Latvia</option>
          <option value="LBN">Lebanon</option>
          <option value="LSO">Lesotho</option>
          <option value="LBR">Liberia</option>
          <option value="LBY">Libya</option>
          <option value="LIE">Liechtenstein</option>
          <option value="LTU">Lithuania</option>
          <option value="LUX">Luxembourg</option>
          <option value="MAC">Macao</option>
          <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
          <option value="MDG">Madagascar</option>
          <option value="MWI">Malawi</option>
          <option value="MYS">Malaysia</option>
          <option value="MDV">Maldives</option>
          <option value="MLI">Mali</option>
          <option value="MLT">Malta</option>
          <option value="MHL">Marshall Islands</option>
          <option value="MTQ">Martinique</option>
          <option value="MRT">Mauritania</option>
          <option value="MUS">Mauritius</option>
          <option value="MYT">Mayotte</option>
          <option value="MEX">Mexico</option>
          <option value="FSM">Micronesia, Federated States of</option>
          <option value="MDA">Moldova, Republic of</option>
          <option value="MCO">Monaco</option>
          <option value="MNG">Mongolia</option>
          <option value="MNE">Montenegro</option>
          <option value="MSR">Montserrat</option>
          <option value="MAR">Morocco</option>
          <option value="MOZ">Mozambique</option>
          <option value="MMR">Myanmar</option>
          <option value="NAM">Namibia</option>
          <option value="NRU">Nauru</option>
          <option value="NPL">Nepal</option>
          <option value="NLD">Netherlands</option>
          <option value="NCL">New Caledonia</option>
          <option value="NZL">New Zealand</option>
          <option value="NIC">Nicaragua</option>
          <option value="NER">Niger</option>
          <option value="NGA">Nigeria</option>
          <option value="NIU">Niue</option>
          <option value="NFK">Norfolk Island</option>
          <option value="MNP">Northern Mariana Islands</option>
          <option value="NOR">Norway</option>
          <option value="OMN">Oman</option>
          <option value="PAK">Pakistan</option>
          <option value="PLW">Palau</option>
          <option value="PSE">Palestinian Territory, Occupied</option>
          <option value="PAN">Panama</option>
          <option value="PNG">Papua New Guinea</option>
          <option value="PRY">Paraguay</option>
          <option value="PER">Peru</option>
          <option value="PHL">Philippines</option>
          <option value="PCN">Pitcairn</option>
          <option value="POL">Poland</option>
          <option value="PRT">Portugal</option>
          <option value="PRI">Puerto Rico</option>
          <option value="QAT">Qatar</option>
          <option value="REU">Réunion</option>
          <option value="ROU">Romania</option>
          <option value="RUS">Russian Federation</option>
          <option value="RWA">Rwanda</option>
          <option value="BLM">Saint Barthélemy</option>
          <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
          <option value="KNA">Saint Kitts and Nevis</option>
          <option value="LCA">Saint Lucia</option>
          <option value="MAF">Saint Martin (French part)</option>
          <option value="SPM">Saint Pierre and Miquelon</option>
          <option value="VCT">Saint Vincent and the Grenadines</option>
          <option value="WSM">Samoa</option>
          <option value="SMR">San Marino</option>
          <option value="STP">Sao Tome and Principe</option>
          <option value="SAU">Saudi Arabia</option>
          <option value="SEN">Senegal</option>
          <option value="SRB">Serbia</option>
          <option value="SYC">Seychelles</option>
          <option value="SLE">Sierra Leone</option>
          <option value="SGP">Singapore</option>
          <option value="SXM">Sint Maarten (Dutch part)</option>
          <option value="SVK">Slovakia</option>
          <option value="SVN">Slovenia</option>
          <option value="SLB">Solomon Islands</option>
          <option value="SOM">Somalia</option>
          <option value="ZAF">South Africa</option>
          <option value="SGS">South Georgia and the South Sandwich Islands</option>
          <option value="SSD">South Sudan</option>
          <option value="ESP">Spain</option>
          <option value="LKA">Sri Lanka</option>
          <option value="SDN">Sudan</option>
          <option value="SUR">Suriname</option>
          <option value="SJM">Svalbard and Jan Mayen</option>
          <option value="SWZ">Swaziland</option>
          <option value="SWE">Sweden</option>
          <option value="CHE">Switzerland</option>
          <option value="SYR">Syrian Arab Republic</option>
          <option value="TWN">Taiwan, Province of China</option>
          <option value="TJK">Tajikistan</option>
          <option value="TZA">Tanzania, United Republic of</option>
          <option value="THA">Thailand</option>
          <option value="TLS">Timor-Leste</option>
          <option value="TGO">Togo</option>
          <option value="TKL">Tokelau</option>
          <option value="TON">Tonga</option>
          <option value="TTO">Trinidad and Tobago</option>
          <option value="TUN">Tunisia</option>
          <option value="TUR">Turkey</option>
          <option value="TKM">Turkmenistan</option>
          <option value="TCA">Turks and Caicos Islands</option>
          <option value="TUV">Tuvalu</option>
          <option value="UGA">Uganda</option>
          <option value="UKR">Ukraine</option>
          <option value="ARE">United Arab Emirates</option>
          <option value="GBR">United Kingdom</option>
          <option value="USA">United States</option>
          <option value="UMI">United States Minor Outlying Islands</option>
          <option value="URY">Uruguay</option>
          <option value="UZB">Uzbekistan</option>
          <option value="VUT">Vanuatu</option>
          <option value="VEN">Venezuela, Bolivarian Republic of</option>
          <option value="VNM">Viet Nam</option>
          <option value="VGB">Virgin Islands, British</option>
          <option value="VIR">Virgin Islands, U.S.</option>
          <option value="WLF">Wallis and Futuna</option>
          <option value="ESH">Western Sahara</option>
          <option value="YEM">Yemen</option>
          <option value="ZMB">Zambia</option>
          <option value="ZWE">Zimbabwe</option>
        </select>
        <span class="national_park_location_error" style="color:red"></span>
        </label>


        <label>
          <span>National Park Details <span class="required">*</span></span>
          <!--textarea id="nationalparkdetails"name=" nationalparkdetails" placeholder="Package Details"  required></textarea--->
          <textarea class="form-control" id="nationalparkdetails" rows="4" cols="95"></textarea>
        </label><span class='nationalparkdetails_error' style="color:red"></span>

        <label>
          <span>National Park Type <span class="required">*</span></span>
          <input type="text" name=" nationalparkType" id="nationalparktype" placeholder="National Park Type eg-Outdoor/Indoor">
          <span class='nationalparktype_error' style="color:red"></span>
        </label>
        <label>
          <span>Price In USD <span class="required">*</span></span>
          <input type="text" name="priceinusd" id="priceinusd" placeholder="Price Is USD ">
          <span class='priceinusd_error' style="color:red"></span>
        </label>
        <label>
          <span>National Park Features <span class="required">*</span></span>
          <input type="text" name="nationalparkfeatures" id="nationalparkfeatures" placeholder="Package Features Eg-free pickup-drop facility">
          <span class='nationalparkfeatures_error' style="color:red"></span>
        </label>

        <label for="image">Attach National Park Image:</label>
        <input type="file" id="image" name="image"><br><br>
        <span class='image_error' style="color:red"></span>
        </label>
        <input type="Submit" value="Submit" id="Submit-btn" />
        <input type="submit" value="Reset" id="Reset-btn" />
      </form>



    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $(document).ready(function() {
        $('#nationalparkname').on('input', function() {
          $('.nationalparkname_error').text('');
        });
        $('#nationalparklocation').on('input', function() {
          $('.nationalparklocation_error').text('');
        });
        $('#nationalparkdetails').on('input', function() {
          $('.nationalparkdetails_error').text('');
        });
        $('#nationalparktype').on('input', function() {
          $('.nationalparktype_error').text('');
        });
        $('#priceinusd').on('input', function() {
          $('.priceinusd_error').text('');
        });
        $('#nationalparkfeatures').on('input', function() {
          $('.nationalparkfeatures_error').text('');
        });
        $('#image').on('change', function() {
          $('.image_error').text('');
        });



        $('#register').submit(function(e) {
          e.preventDefault();
          //var user_id = $('#user_id').val();
          var nationalparkname = $('#nationalparkname').val();
          var nationalparklocation = $('#nationalparklocation').val();
          var nationalparkdetails = $('#nationalparkdetails').val();
          var nationalparktype = $('#nationalparktype').val();
          var priceinusd = $('#priceinusd').val();
          var nationalparkfeatures = $('#nationalparkfeatures').val();
          var file = $('#image')[0].files[0];
         
          var formData = new FormData();
        
          formData.append('nationalparkname', nationalparkname);
          formData.append('nationalparklocation', nationalparklocation);
          formData.append('nationalparkdetails', nationalparkdetails);
          formData.append('nationalparktype', nationalparktype);
          formData.append('priceinusd', priceinusd);
          formData.append('nationalparkfeatures', nationalparkfeatures);
          formData.append('image', file);

          var isValid = true;

          // Validation checks for each input field
          if ($('#nationalparkname').val() === '') {
            $('.nationalparkname_error').text('This is required');
            isValid = false;
          } else if ($('#nationalparklocation').val() === '') {
            $('.nationalparklocation_error').text('This is required');
            isValid = false;
          } else if ($('#nationalparkdetails').val() === '') {
            $('.nationalparkdetails_error').text('This is required');
            isValid = false;
          } else if ($('#nationalparktype').val() === '') {
            $('.nationalparktype_error').text('This is required');
            isValid = false;
          } else if ($('#priceinusd').val() === '') {
            $('.priceinusd_error').text('This is required');
            isValid = false;
          } else if ($('#nationalparkfeatures').val() === '') {
            $('.nationalparkfeatures_error').text('This is required');
            isValid = false;
          } else if (!$('#image').val()) {
            $('.image_error').text('Image is required');
            isValid = false;
          } else {


            if (isValid) {


              $.ajax({
                type: 'POST',
                url: 'Form-Submission.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                  var data = JSON.parse(response);
                  if (data.status == "error") {
                    alert(data.msg);
                  } else {
                    alert(data.msg);
                    // window.location.href = "Login.php";
                  }

                }
              });
            }

          }

        });
      });

    });
  </script>
</body>

</html>