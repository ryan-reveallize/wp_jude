<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jude
 */

get_header();
$featured_image = get_the_post_thumbnail_url();
?>

<?php
$career_post_type = 'artists';
$args = array(
    'post_type'                => $career_post_type,
    'posts_per_page'           => -1,
    'caller_get_posts'         => -1,
    'orderby'                  => 'name',
    'order'                    => 'ASC',
);

$the_query = new WP_Query($args);
$dataTitle = [];

if ($the_query->have_posts()) {
    while ($the_query->have_posts()) : $the_query->the_post();
        foreach (get_field('gallery_options') as $data) {
            array_push($dataTitle, $data['title']);
        }

    endwhile;
}
?><style>
    .header-banner {
        z-index: 3;
    }

    /*the container must be positioned relative:*/
    .custom-select {
        position: relative;
    }

    .custom-select select {
        display: none;
        /*hide original SELECT element:*/
    }

    /*style the arrow inside the select element:*/
    .select-selected:after {
        position: absolute;
        content: "";
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        top: 14px;
        right: 10px;
        width: 20px;
        height: 20px;
    }

    /*point the arrow upwards when the select box is open (active):*/
    .select-selected.select-arrow-active:after {
        transform: rotate(-180deg);
    }

    /*style the items (options), including the selected item:*/
    .select-items div,
    .select-selected {
        cursor: pointer;
        user-select: none;
        color: rgb(48, 57, 78);
        font-size: 18px;
    }

    .select-items div {
        font-size: 18px;
        padding: 2px 16px;

    }

    .select-selected {
        padding: 10px 16px;
        background-color: #FFFFFF;
        color: rgb(48 57 78 / 50%);
    }


    /*style items (options):*/
    .select-items {
        position: absolute;
        background-color: #FFFFFF;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 99;
        padding: 0 1rem;
    }

    /*hide the items when the select box is closed:*/
    .select-hide {
        display: none;
    }

    .select-items div:hover,
    .select-items div:focus,
    .select-items div.same-as-selected {
        background-color: #1F2227;
        color: #FFFFFF;
    }

    .header-mask {
        position: absolute;
        top: 0;
        right: 0;
        max-height: 90vh;
        z-index: -1;
    }

    .header-banner:after {
        background: none;
    }

    .artist-list {
        position: relative;
        z-index: 4;
    }

    @media screen and (max-width: 767px) {
        .header-banner {
            min-height: 300px;
        }
    }
</style>

<main id="primary" class="site-main pb-5 mb-5">
    <div class="header-banner bg-img mb-md-5">
        <img src="<?php bloginfo('template_directory') ?>/assets/header-mask.png" alt="Header Mask" class="header-mask" />
        <div class="container z-2">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row align-items-center artists-wrapper">
                        <div class="col-md-6 col-lg-8">
                            <h1 class="display-1 mb-3  font-glam-extended">Our Artists</h1>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="artists-filter" style="position:relative;z-index:9999;">
                                <form class="searchandfilter" id="search-filter-form-37">
                                    <ul>
                                        <li class="sf-field-taxonomy-artists-category" data-sf-field-name="_sft_artists-category" data-sf-field-type="taxonomy" data-sf-field-input-type="select">
                                            <div class="custom-select">
                                                <select name="_sft_artists-category[]" class="sf-input-select" title="">

                                                    <option class="sf-level-0 sf-item-0 sf-option-active" selected="selected" data-sf-count="0" data-sf-depth="0" value="">Select Artist By Category</option>

                                                    <?php foreach (array_unique($dataTitle) as $data) { ?>
                                                        <option <?php if ($data === $_GET['filter']) {
                                                                    echo 'selected';
                                                                } ?> class="sf-level-0 sf-item-2" value="<?php echo $data; ?>"><?php echo $data; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="artist-list">
        <div class="container">
            <div class="artists-result">
                <?php echo do_shortcode('[searchandfilter id="37" show="results"]'); ?>
            </div>
        </div>
    </div>
</main><!-- #main -->

<script>
    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        window.location.href = window.location.origin + window.location.pathname + '?filter=' + s.options[i].innerHTML
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
</script>


<?php get_footer(); ?>