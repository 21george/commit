<section class="additional-content-info">
        <div class="general_features">
                <h3 class="beautiful-heading">General Features</h3>
                <ul class="ul-reset">
                    <li>Property Type: <?php if(isset($real->post_property_type)){echo $real->post_property_type;};?></li>
                    <li>Bedrooms : <?php if(isset($real->num_beds)){echo $real->num_beds;};?></li>
                    <li>showers :<?php if(isset($real->num_showers)){echo $real->num_showers;};?></li>
                </ul>
        </div>

        <div class="indoor_features">
                <h3 class="beautiful-heading">Indoor Features</h3>
                <ul class="ul-reset">
                    <li>Toiltes:<?php if(isset($real->num_toilets)){echo $real->num_toilets;};?></li>
                    <li>Study : <?php if(isset($real->study)){echo $real->study;};?></li>
                </ul>
        </div>

        
        <div class="outdoor_features">
                <h3 class="beautiful-heading">Outdoor Features</h3>
                <ul class="ul-reset">
                   
                    <li>None</li>
                </ul>
        </div>

        <div class="floor-plans_features">
                <h3 class="beautiful-heading">floor plans & interactive tours</h3>
                <ul class="ul-reset">
                    <li><a href="">floor plan</a></li>
                </ul>
        </div>
    </section>
    <!--end of post content-->