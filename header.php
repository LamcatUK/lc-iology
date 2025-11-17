<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package lc-iology
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/montserrat-v25-latin-600.woff2' ); ?>"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/montserrat-v25-latin-800.woff2' ); ?>"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/montserrat-v25-latin-regular.woff2' ); ?>"
        as="font" type="font/woff2" crossorigin="anonymous">
    <?php

        // ORGANIZATION SCHEMA.
    $schema = array(
		'@context'           => 'https://schema.org',
		'@type'              => 'LocalBusiness',
		'@id'                => 'http://iology.co.uk/#business',
		'name'               => 'Iology',
		'logo'               => 'https://iology.co.uk/wp-content/uploads/2023/02/iology-org.png',
		'image'              => 'https://iology.co.uk/wp-content/uploads/2023/02/iology-org.png',
		'description'        => 'Iology is your independent optician in Barking (IG11), providing expert eye tests, contact lenses, and designer glasses for adults and children across Barking & East London. Located at 50 Ripple Road, Barking, our experienced optometrists deliver friendly, personalised care using the latest eye-care technology. We offer NHS and private eye examinations, contact lens fittings, and a wide range of designer and budget eyewear, including Ray-Ban, Oakley, and more. Whether you need a routine check-up, children\'s spectacles, or stylish new frames, Iology in Barking is dedicated to helping you see clearly and look great. Book your appointment online or call today.',
		'address'            => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => '50 Ripple Road',
			'addressLocality' => 'Barking',
			'addressRegion'   => 'England',
			'postalCode'      => 'IG11 7PG',
			'addressCountry'  => 'GB',
		),
		'telephone'          => '020 8594 2714',
		'url'                => 'http://iology.co.uk/',
		'priceRange'         => '$',
		'currenciesAccepted' => 'GBP',
		'paymentAccepted'    => 'Cash, Credit Card, Debit Card',
		'founder'            => 'Samir Rao',
		'slogan'             => 'Your local, independent optician.',
		'geo'                => array(
			'@type'     => 'GeoCoordinates',
			'latitude'  => 51.5364754,
			'longitude' => 0.08115180000000001,
		),
		'sameAs'             => array(
			'https://www.instagram.com/iology1',
			'https://www.google.com/maps/place/?q=place_id:ChIJIaUhT22m2EcRauJmDuJeaqs',
		),
		'aggregateRating'    => array(
			'@type'       => 'AggregateRating',
			'ratingValue' => 5,
			'reviewCount' => 166,
			'bestRating'  => 5,
		),
		'makesOffer'         => array(
			array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'Comprehensive Eye Test',
					'description' => 'A full eye examination including vision assessment, prescription measurement, and screening for glaucoma, cataracts, macular degeneration, and general eye health conditions.',
					'provider'    => array(
						'@id' => 'http://iology.co.uk/#business',
					),
				),
			),
			array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'NHS Eye Test',
					'description' => 'An NHS-funded eye examination available for eligible patients, including children, over-60s, students, and those with qualifying medical conditions.',
					'provider'    => array(
						'@id' => 'http://iology.co.uk/#business',
					),
				),
			),
			array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'Contact Lens Fitting and Aftercare',
					'description' => 'A complete contact lens service including initial assessment, lens fitting, suitability checks, trials, and ongoing aftercare appointments.',
					'provider'    => array(
						'@id' => 'http://iology.co.uk/#business',
					),
				),
			),
			array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'Designer Glasses and Prescription Frames',
					'description' => 'A range of designer and budget eyewear options including prescription glasses, sunglasses, and specialist lenses, fitted by qualified opticians.',
					'provider'    => array(
						'@id' => 'http://iology.co.uk/#business',
					),
				),
			),
			array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'Children\'s Eye Tests and Glasses',
					'description' => 'Eye examinations designed for children of all ages, including early vision screening and access to free NHS glasses for eligible patients.',
					'provider'    => array(
						'@id' => 'http://iology.co.uk/#business',
					),
				),
			),
			array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'Digital Eye Strain and Screen-Related Vision Assessment',
					'description' => 'A specialist assessment for customers presenting with headaches, tired eyes, blurred vision, or discomfort related to prolonged digital device use.',
					'provider'    => array(
						'@id' => 'http://iology.co.uk/#business',
					),
				),
			),
			array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'Varifocal and Multifocal Lens Consultation',
					'description' => 'A tailored assessment to determine suitability for varifocal or multifocal lenses, including lifestyle evaluation, measurement, and professional fitting.',
					'provider'    => array(
						'@id' => 'http://iology.co.uk/#business',
					),
				),
			),
			array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'Prescription Sunglasses and UV Protection Eyewear',
					'description' => 'A complete prescription sunglasses service offering UV-protective lenses, polarised options, and custom tints for outdoor comfort and eye safety.',
					'provider'    => array(
						'@id' => 'http://iology.co.uk/#business',
					),
				),
			),
			array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'Glaucoma and Eye Pressure Screening',
					'description' => 'A clinical screening service to check intraocular pressure and assess early signs of glaucoma using advanced diagnostic equipment.',
					'provider'    => array(
						'@id' => 'http://iology.co.uk/#business',
					),
				),
			),
			array(
				'@type'       => 'Offer',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'Diabetic Retinal Screening and Monitoring',
					'description' => 'A specialised eye examination focusing on detecting and monitoring diabetic retinopathy and other diabetes-related eye complications.',
					'provider'    => array(
						'@id' => 'http://iology.co.uk/#business',
					),
				),
			),
		),
		'areaServed'         => array(
			array(
				'@type'       => 'GeoCircle',
				'geoMidpoint' => array(
					'@type'     => 'GeoCoordinates',
					'latitude'  => 51.5364754,
					'longitude' => 0.08115180000000001,
				),
				'geoRadius'   => '50mi',
				'name'        => 'Ilford, UK;Barking, UK;Rainham, UK;Romford, UK;Dagenham, UK;Goodmayes, UK;East Ham, London, UK;Plaistow, London, UK;Stratford, London, UK;Forest Gate, London, UK;Seven Kings, Ilford, UK;Manor Park, London E12, UK;Becontree, Dagenham RM8, UK;London Borough of Havering, UK;London Borough of Redbridge, UK;Creekmouth, Barking IG11 0EG, UK;Chadwell Heath, Romford RM6 6AS, UK;London Borough of Newham, London, UK;London Borough of Barking and Dagenham, UK',
			),
		),
	);

	// Add opening hours from plugin if available.
	if ( function_exists( 'get_opening_hours_specification_array' ) ) {
		$opening_hours = get_opening_hours_specification_array();
		if ( ! empty( $opening_hours ) ) {
			$schema['openingHoursSpecification'] = $opening_hours;
		}
	}
    ?>
<script type="application/ld+json">
<?php
// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );
?>
</script>
    <?php

    if ( get_field( 'ga_property', 'options' ) ) {
        ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?= esc_attr( get_field( 'ga_property', 'options' ) ); ?>">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
            '<?= esc_attr( get_field( 'ga_property', 'options' ) ); ?>'
        );
    </script>
        <?php
    }
    if ( get_field( 'gtm_property', 'options' ) ) {
        ?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer',
            '<?= esc_attr( get_field( 'gtm_property', 'options' ) ); ?>'
        );
    </script>
    <!-- End Google Tag Manager -->
        <?php
    }
    if ( get_field( 'google_site_verification', 'options' ) ) {
        echo '<meta name="google-site-verification" content="' . esc_attr( get_field( 'google_site_verification', 'options' ) ) . '" />';
    }
    if ( get_field( 'bing_site_verification', 'options' ) ) {
        echo '<meta name="msvalidate.01" content="' . esc_attr( get_field( 'bing_site_verification', 'options' ) ) . '" />';
    }

    wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
    <?php
    do_action( 'wp_body_open' );
    ?>
    <div class="site" id="page">
        <nav id="navbar" class="navbar navbar-expand-xl fixed-top d-block p-0" aria-labelledby="main-nav-label">
            <div id="top-nav">
                <div class="container-xl d-flex align-items-center justify-content-between">
                    <a href="/" class="navbar-brand logo-link logo" rel="home" aria-label="Prenplants Homepage"></a>
                    <div class="d-none d-xl-flex navbar-nav justify-content-end my-2 w-100 align-content-end">
                        <div class="contacts d-flex justify-content-between me-4 w-100">
                            <a href="/book-appointment/" class="nav-link"><i class="fa-regular fa-calendar"></i>
                                Book an appointment</a>
                            <a href="/contact/" class="nav-link"><i class="fa-solid fa-map-marker-alt"></i>
                                Find us</a>
                            <a href="tel:<?= esc_attr( parse_phone( get_field( 'phone', 'options' ) ) ); ?>"
                                class="nav-link"><i class="fa-solid fa-phone"></i>
                                Call us on
                                <?= esc_html( get_field( 'phone', 'options' ) ); ?></a>
                            <a href="mailto:<?= esc_attr( get_field( 'email', 'options' ) ); ?>"
                                class="nav-link"><i class="fa-regular fa-envelope"></i>
                                email
                                <?= esc_html( get_field( 'email', 'options' ) ); ?></a>
                        </div>
                    </div>
                    <div class="d-flex d-xl-none align-self-center">
                        <button class="navbar-toggler collapsed align-self-end me-auto input-button" id="navToggle"
                            data-bs-toggle="collapse" data-bs-target="#primaryNav" type="button"
                            aria-label="Navigation Toggle">
                            <span class="navbar-icon"><i class="fa-solid fa-bars"></i></span>
                            <div class="close-icon py-1"><i class="fa-solid fa-times"></i></div>
                        </button>
                    </div>
                </div>
            </div>
            <div id="main-nav">
                <div class="container-xl">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary_nav',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id'    => 'primaryNav',
                            'menu_class'      => 'navbar-nav w-100 justify-content-between align-items-xl-center',
                            'fallback_cb'     => '',
                            'menu_id'         => 'main-menu',
                            'depth'           => 2,
                            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                        )
                    );
                    ?>
                </div>
            </div>
        </nav>