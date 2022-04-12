<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("keys.php");
require("MainFunction.php");
$store = $_GET['shop'];

$db = mysqli_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);

$sql = "SELECT access_token, iana_timezone FROM installs WHERE store ='$store'";
$result = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount > 0) {
	$row = mysqli_fetch_assoc($result); 
	$access_token = $row['access_token'];
}
$sc = new ShopifyClient($store, $access_token, $SHOPIFY_APIKEY, $SHOPIFY_SECRET);



?>
<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/@shopify/polaris@6.6.0/dist/styles.css"/>
    <style>
        #sd-other-apps{
            width: 100%;
            margin: 0 auto;
        }
        #sd-other-apps > div {
            display: flex;
            flex-wrap: wrap;
            margin-left: -15px;
            margin-right: -15px;
        }
        #sd_themesetup .Polaris-Stack > .sd-Left-RemoveButton {
            margin-left: 0px;
        }
        #sd-other-apps .grid__item {
            flex: 1 1 50%;
            padding: 15px;
        }
        #sd-other-apps a {
            text-decoration: none;
        }
        #sd-other-apps .ui-app-card {
            display: flex;
        }
        #sd-other-apps .ui-app-card__icon-container {
            flex: 0 0 60px;
        }
        #sd-other-apps .ui-app-card__details {
            flex: 1 1 auto;
            padding-left: 15px;
        }
        #sd-other-apps h4.ui-app-card__name {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: block;
            margin-bottom: 0.625em;
            color: #212b35;
            font-size: 1em;
            line-height: 1.25;
            font-weight: 700;
            font-family: ShopifySans, Helvetica, Arial, sans-serif;
            font-size: 1.125em;
            margin: 0;
        }
        #sd-other-apps .ui-app-card__context {
            color: #454f5b;
            line-height: 1.25;
            padding: 0.125em 0;
            font-size: 0.875em;
            margin-top: 0.3125em;
        }
        #sd-other-apps p.ui-app-card__description {
            color: #637381;
            cursor: pointer;
            grid-area: tagline;
            margin: 6px 0 7px;
            line-height: 1.2;
            font-size: 0.9em;
        }
        #sd-other-apps .ui-app-card__icon-container img {
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 4px 4px 8px #12128394;
        }
    </style>
</head>
<?php 
    try {
        $duplicate_products = $sc->call('GET','/admin/api/'.$SHOPIFY_API_VERSION.'/products.json?vendor=Duplicate%20-%20Preorder%20Product');
    }
    catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }

    $date = new DateTime("now", new DateTimeZone($row['iana_timezone']) );
    $storeDate = $date->format('Y-m-d H:i:s');
?>
<body>
    <input type="hidden" value="<?php echo $store ?>" id="shopname">
	<input type="hidden" value="<?php echo $access_token; ?>" id="tokenstore" />
	<input type="hidden" value="<?php echo $SHOPIFY_APIKEY; ?>" id="apikey" />
	<input type="hidden" value="<?php echo $SHOPIFY_DOMAIN_URL; ?>" id="SHOPIFY_DOMAIN_URL" />
	<input type="hidden" value="<?php echo $SHOPIFY_SECRET; ?>" id="SHOPIFY_SECRET" />
    <div>
        <div style="--p-background: rgba(246, 246, 247, 1); --p-background-hovered: rgba(241, 242, 243, 1); --p-background-pressed: rgba(237, 238, 239, 1); --p-background-selected: rgba(237, 238, 239, 1); --p-surface: rgba(255, 255, 255, 1); --p-surface-neutral: rgba(228, 229, 231, 1); --p-surface-neutral-hovered: rgba(219, 221, 223, 1); --p-surface-neutral-pressed: rgba(201, 204, 208, 1); --p-surface-neutral-disabled: rgba(241, 242, 243, 1); --p-surface-neutral-subdued: rgba(246, 246, 247, 1); --p-surface-subdued: rgba(250, 251, 251, 1); --p-surface-disabled: rgba(250, 251, 251, 1); --p-surface-hovered: rgba(246, 246, 247, 1); --p-surface-pressed: rgba(241, 242, 243, 1); --p-surface-depressed: rgba(237, 238, 239, 1); --p-surface-search-field: rgba(241, 242, 243, 1); --p-backdrop: rgba(0, 0, 0, 0.5); --p-overlay: rgba(255, 255, 255, 0.5); --p-shadow-from-dim-light: rgba(0, 0, 0, 0.2); --p-shadow-from-ambient-light: rgba(23, 24, 24, 0.05); --p-shadow-from-direct-light: rgba(0, 0, 0, 0.15); --p-hint-from-direct-light: rgba(0, 0, 0, 0.15); --p-border: rgba(140, 145, 150, 1); --p-border-neutral-subdued: rgba(186, 191, 195, 1); --p-border-hovered: rgba(153, 158, 164, 1); --p-border-disabled: rgba(210, 213, 216, 1); --p-border-subdued: rgba(201, 204, 207, 1); --p-border-depressed: rgba(87, 89, 89, 1); --p-border-shadow: rgba(174, 180, 185, 1); --p-border-shadow-subdued: rgba(186, 191, 196, 1); --p-divider: rgba(225, 227, 229, 1); --p-icon: rgba(92, 95, 98, 1); --p-icon-hovered: rgba(26, 28, 29, 1); --p-icon-pressed: rgba(68, 71, 74, 1); --p-icon-disabled: rgba(186, 190, 195, 1); --p-icon-subdued: rgba(140, 145, 150, 1); --p-text: rgba(32, 34, 35, 1); --p-text-disabled: rgba(140, 145, 150, 1); --p-text-subdued: rgba(109, 113, 117, 1); --p-interactive: rgba(44, 110, 203, 1); --p-interactive-disabled: rgba(189, 193, 204, 1); --p-interactive-hovered: rgba(31, 81, 153, 1); --p-interactive-pressed: rgba(16, 50, 98, 1); --p-icon-interactive: rgba(44, 110, 203, 1); --p-focused: rgba(69, 143, 255, 1); --p-surface-selected: rgba(242, 247, 254, 1); --p-surface-selected-hovered: rgba(237, 244, 254, 1); --p-surface-selected-pressed: rgba(229, 239, 253, 1); --p-icon-on-interactive: rgba(255, 255, 255, 1); --p-text-on-interactive: rgba(255, 255, 255, 1); --p-action-secondary: rgba(255, 255, 255, 1); --p-action-secondary-disabled: rgba(255, 255, 255, 1); --p-action-secondary-hovered: rgba(246, 246, 247, 1); --p-action-secondary-pressed: rgba(241, 242, 243, 1); --p-action-secondary-depressed: rgba(109, 113, 117, 1); --p-action-primary: rgba(0, 128, 96, 1); --p-action-primary-disabled: rgba(241, 241, 241, 1); --p-action-primary-hovered: rgba(0, 110, 82, 1); --p-action-primary-pressed: rgba(0, 94, 70, 1); --p-action-primary-depressed: rgba(0, 61, 44, 1); --p-icon-on-primary: rgba(255, 255, 255, 1); --p-text-on-primary: rgba(255, 255, 255, 1); --p-text-primary: rgba(0, 123, 92, 1); --p-text-primary-hovered: rgba(0, 108, 80, 1); --p-text-primary-pressed: rgba(0, 92, 68, 1); --p-surface-primary-selected: rgba(241, 248, 245, 1); --p-surface-primary-selected-hovered: rgba(179, 208, 195, 1); --p-surface-primary-selected-pressed: rgba(162, 188, 176, 1); --p-border-critical: rgba(253, 87, 73, 1); --p-border-critical-subdued: rgba(224, 179, 178, 1); --p-border-critical-disabled: rgba(255, 167, 163, 1); --p-icon-critical: rgba(215, 44, 13, 1); --p-surface-critical: rgba(254, 211, 209, 1); --p-surface-critical-subdued: rgba(255, 244, 244, 1); --p-surface-critical-subdued-hovered: rgba(255, 240, 240, 1); --p-surface-critical-subdued-pressed: rgba(255, 233, 232, 1); --p-surface-critical-subdued-depressed: rgba(254, 188, 185, 1); --p-text-critical: rgba(215, 44, 13, 1); --p-action-critical: rgba(216, 44, 13, 1); --p-action-critical-disabled: rgba(241, 241, 241, 1); --p-action-critical-hovered: rgba(188, 34, 0, 1); --p-action-critical-pressed: rgba(162, 27, 0, 1); --p-action-critical-depressed: rgba(108, 15, 0, 1); --p-icon-on-critical: rgba(255, 255, 255, 1); --p-text-on-critical: rgba(255, 255, 255, 1); --p-interactive-critical: rgba(216, 44, 13, 1); --p-interactive-critical-disabled: rgba(253, 147, 141, 1); --p-interactive-critical-hovered: rgba(205, 41, 12, 1); --p-interactive-critical-pressed: rgba(103, 15, 3, 1); --p-border-warning: rgba(185, 137, 0, 1); --p-border-warning-subdued: rgba(225, 184, 120, 1); --p-icon-warning: rgba(185, 137, 0, 1); --p-surface-warning: rgba(255, 215, 157, 1); --p-surface-warning-subdued: rgba(255, 245, 234, 1); --p-surface-warning-subdued-hovered: rgba(255, 242, 226, 1); --p-surface-warning-subdued-pressed: rgba(255, 235, 211, 1); --p-text-warning: rgba(145, 106, 0, 1); --p-border-highlight: rgba(68, 157, 167, 1); --p-border-highlight-subdued: rgba(152, 198, 205, 1); --p-icon-highlight: rgba(0, 160, 172, 1); --p-surface-highlight: rgba(164, 232, 242, 1); --p-surface-highlight-subdued: rgba(235, 249, 252, 1); --p-surface-highlight-subdued-hovered: rgba(228, 247, 250, 1); --p-surface-highlight-subdued-pressed: rgba(213, 243, 248, 1); --p-text-highlight: rgba(52, 124, 132, 1); --p-border-success: rgba(0, 164, 124, 1); --p-border-success-subdued: rgba(149, 201, 180, 1); --p-icon-success: rgba(0, 127, 95, 1); --p-surface-success: rgba(174, 233, 209, 1); --p-surface-success-subdued: rgba(241, 248, 245, 1); --p-surface-success-subdued-hovered: rgba(236, 246, 241, 1); --p-surface-success-subdued-pressed: rgba(226, 241, 234, 1); --p-text-success: rgba(0, 128, 96, 1); --p-decorative-one-icon: rgba(126, 87, 0, 1); --p-decorative-one-surface: rgba(255, 201, 107, 1); --p-decorative-one-text: rgba(61, 40, 0, 1); --p-decorative-two-icon: rgba(175, 41, 78, 1); --p-decorative-two-surface: rgba(255, 196, 176, 1); --p-decorative-two-text: rgba(73, 11, 28, 1); --p-decorative-three-icon: rgba(0, 109, 65, 1); --p-decorative-three-surface: rgba(146, 230, 181, 1); --p-decorative-three-text: rgba(0, 47, 25, 1); --p-decorative-four-icon: rgba(0, 106, 104, 1); --p-decorative-four-surface: rgba(145, 224, 214, 1); --p-decorative-four-text: rgba(0, 45, 45, 1); --p-decorative-five-icon: rgba(174, 43, 76, 1); --p-decorative-five-surface: rgba(253, 201, 208, 1); --p-decorative-five-text: rgba(79, 14, 31, 1); --p-border-radius-base: 0.4rem; --p-border-radius-wide: 0.8rem; --p-border-radius-full: 50%; --p-card-shadow: 0px 0px 5px var(--p-shadow-from-ambient-light), 0px 1px 2px var(--p-shadow-from-direct-light); --p-popover-shadow: -1px 0px 20px var(--p-shadow-from-ambient-light), 0px 1px 5px var(--p-shadow-from-direct-light); --p-modal-shadow: 0px 26px 80px var(--p-shadow-from-dim-light), 0px 0px 1px var(--p-shadow-from-dim-light); --p-top-bar-shadow: 0 2px 2px -1px var(--p-shadow-from-direct-light); --p-button-drop-shadow: 0 1px 0 rgba(0, 0, 0, 0.05); --p-button-inner-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.2); --p-button-pressed-inner-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.15); --p-override-none: none; --p-override-transparent: transparent; --p-override-one: 1; --p-override-visible: visible; --p-override-zero: 0; --p-override-loading-z-index: 514; --p-button-font-weight: 500; --p-non-null-content: ''; --p-choice-size: 2rem; --p-icon-size: 1rem; --p-choice-margin: 0.1rem; --p-control-border-width: 0.2rem; --p-banner-border-default: inset 0 0.1rem 0 0 var(--p-border-neutral-subdued), inset 0 0 0 0.1rem var(--p-border-neutral-subdued); --p-banner-border-success: inset 0 0.1rem 0 0 var(--p-border-success-subdued), inset 0 0 0 0.1rem var(--p-border-success-subdued); --p-banner-border-highlight: inset 0 0.1rem 0 0 var(--p-border-highlight-subdued), inset 0 0 0 0.1rem var(--p-border-highlight-subdued); --p-banner-border-warning: inset 0 0.1rem 0 0 var(--p-border-warning-subdued), inset 0 0 0 0.1rem var(--p-border-warning-subdued); --p-banner-border-critical: inset 0 0.1rem 0 0 var(--p-border-critical-subdued), inset 0 0 0 0.1rem var(--p-border-critical-subdued); --p-badge-mix-blend-mode: luminosity; --p-thin-border-subdued: 0.1rem solid var(--p-border-subdued); --p-text-field-spinner-offset: 0.2rem; --p-text-field-focus-ring-offset: -0.4rem; --p-text-field-focus-ring-border-radius: 0.7rem; --p-button-group-item-spacing: -0.1rem; --p-duration-1-0-0: 100ms; --p-duration-1-5-0: 150ms; --p-ease-in: cubic-bezier(0.5, 0.1, 1, 1); --p-ease: cubic-bezier(0.4, 0.22, 0.28, 1); --p-range-slider-thumb-size-base: 1.6rem; --p-range-slider-thumb-size-active: 2.4rem; --p-range-slider-thumb-scale: 1.5; --p-badge-font-weight: 400; --p-frame-offset: 0px;">
            <div class="Polaris-Frame Polaris-Frame--hasNav Polaris-Frame--hasTopBar" data-polaris-layer="true" data-has-navigation="true">
                <div class="Polaris-Frame__Skip"><a href="#AppFrameMain">Skip to content</a></div>
                <div class="Polaris-Frame__TopBar" data-polaris-layer="true" data-polaris-top-bar="true" id="AppFrameTopBar">
                    <div class="Polaris-TopBar">
                        
                    </div>
                </div>
                <main class="Polaris-Frame__Main" id="AppFrameMain" data-has-global-ribbon="false" style="padding-left: 0;">
                    <div class="Polaris-Frame__Content">
                        <div class="Polaris-Page">
                            <div class="Polaris-Page-Header Polaris-Page-Header--isSingleRow Polaris-Page-Header--mobileView Polaris-Page-Header--noBreadcrumbs Polaris-Page-Header--mediumTitle">
                                <div class="Polaris-Page-Header__Row">
                                    <div class="Polaris-Page-Header__TitleWrapper">
                                        <div>
                                            <div class="Polaris-Header-Title__TitleAndSubtitleWrapper">
                                                <h1 class="Polaris-Header-Title">The Fashion Agent Global</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Polaris-Page__Content">
                                <div class="Polaris-Card">
                                    <div class="Polaris-CalloutCard__Container">
                                        <div class="Polaris-Card__Section">
                                            <div class="Polaris-CalloutCard">
                                                <div class="Polaris-CalloutCard__Content">
                                                    <div class="Polaris-CalloutCard__Title">
                                                        <h2 class="Polaris-Heading">Custom Module (Preorder App)</h2>
                                                    </div>
                                                    <div class="Polaris-TextContainer">
                                                        <p>Delete Duplicate Pre-order Products Manually (Those Products will be deleted, whose 20 minutes time is completed)</p>
                                                    </div>
                                                    <div class="Polaris-CalloutCard__Buttons">
                                                        <button class="Polaris-Button Polaris-Button--destructive sd-delete_duplicate_products <?php if(empty($duplicate_products)){ echo 'Polaris-Button--disabled'; } ?>" type="button" aria-busy="true">
                                                            <span class="Polaris-Button__Content">
                                                                <span class="Polaris-Button__Spinner" style="display:none;">
                                                                    <span class="Polaris-Spinner Polaris-Spinner--sizeSmall">
                                                                        <svg viewBox="0 0 20 20">
                                                                            <path d="M7.229 1.173a9.25 9.25 0 1011.655 11.412 1.25 1.25 0 10-2.4-.698 6.75 6.75 0 11-8.506-8.329 1.25 1.25 0 10-.75-2.385z"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span role="status"><span class="Polaris-VisuallyHidden">Loading</span></span>
                                                                </span>
                                                                <span class="Polaris-Button__Text">Delete</span>
                                                            </span>
                                                        </button>
                                                        <button class="Polaris-Button Sd-Polaris-Refresh-Duplicate" type="button">
                                                            <span class="Polaris-Button__Content">
                                                            <span class="Polaris-Button__Spinner" style="display:none;">
                                                                <span class="Polaris-Spinner Polaris-Spinner--sizeSmall">
                                                                        <svg viewBox="0 0 20 20">
                                                                            <path d="M7.229 1.173a9.25 9.25 0 1011.655 11.412 1.25 1.25 0 10-2.4-.698 6.75 6.75 0 11-8.506-8.329 1.25 1.25 0 10-.75-2.385z"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span role="status"><span class="Polaris-VisuallyHidden">Loading</span></span>
                                                                </span>
                                                                <span class="Polaris-Button__Text">Refresh</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <svg viewBox="0 0 64 64" style=" width: 100px;"><radialGradient id="SrYuS0MYDGH9m0SRC6_noa" cx="31.417" cy="-1098.083" r="28.77" gradientTransform="translate(0 1128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f4e09d"/><stop offset=".226" stop-color="#f8e8b5"/><stop offset=".513" stop-color="#fcf0cd"/><stop offset=".778" stop-color="#fef4dc"/><stop offset="1" stop-color="#fff6e1"/></radialGradient><path fill="url(#SrYuS0MYDGH9m0SRC6_noa)" d="M7.5,64L7.5,64c1.933,0,3.5-1.567,3.5-3.5l0,0c0-1.933-1.567-3.5-3.5-3.5l0,0 C5.567,57,4,58.567,4,60.5l0,0C4,62.433,5.567,64,7.5,64z"/><radialGradient id="SrYuS0MYDGH9m0SRC6_nob" cx="31.5" cy="-1096" r="31.751" gradientTransform="translate(0 1128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f4e09d"/><stop offset=".226" stop-color="#f8e8b5"/><stop offset=".513" stop-color="#fcf0cd"/><stop offset=".778" stop-color="#fef4dc"/><stop offset="1" stop-color="#fff6e1"/></radialGradient><path fill="url(#SrYuS0MYDGH9m0SRC6_nob)" d="M62,20.5L62,20.5c0-2.485-2.015-4.5-4.5-4.5H49c-2.209,0-4-1.791-4-4l0,0 c0-2.209,1.791-4,4-4h2c2.209,0,4-1.791,4-4l0,0c0-2.209-1.791-4-4-4H20c-2.209,0-4,1.791-4,4l0,0c0,2.209,1.791,4,4,4h2 c1.657,0,3,1.343,3,3l0,0c0,1.657-1.343,3-3,3H7.5C5.567,14,4,15.567,4,17.5l0,0C4,19.433,5.567,21,7.5,21H9c1.657,0,3,1.343,3,3 l0,0c0,1.657-1.343,3-3,3H5c-2.761,0-5,2.239-5,5l0,0c0,2.761,2.239,5,5,5h2.5c1.933,0,3.5,1.567,3.5,3.5l0,0 c0,1.933-1.567,3.5-3.5,3.5H6c-2.209,0-4,1.791-4,4l0,0c0,2.209,1.791,4,4,4h11.5c1.381,0,2.5,1.119,2.5,2.5l0,0 c0,1.381-1.119,2.5-2.5,2.5l0,0c-1.933,0-3.5,1.567-3.5,3.5l0,0c0,1.933,1.567,3.5,3.5,3.5h35c1.933,0,3.5-1.567,3.5-3.5l0,0 c0-1.933-1.567-3.5-3.5-3.5H52c-1.105,0-7-0.895-7-2l0,0c0-1.105,0.895-2,2-2h12c2.209,0,4-1.791,4-4l0,0c0-2.209-1.791-4-4-4h-2.5 c-1.381,0-2.5-1.119-2.5-2.5l0,0c0-1.381,1.119-2.5,2.5-2.5H57c2.209,0,4-1.791,4-4l0,0c0-2.209-1.791-4-4-4h-4.5 c-1.933,0-3.5-1.567-3.5-3.5l0,0c0-1.933,1.567-3.5,3.5-3.5h5C59.985,25,62,22.985,62,20.5z"/><g><linearGradient id="SrYuS0MYDGH9m0SRC6_noc" x1="32" x2="32" y1="53" y2="8" gradientTransform="matrix(1 0 0 -1 0 64)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#def9ff"/><stop offset=".282" stop-color="#cff6ff"/><stop offset=".823" stop-color="#a7efff"/><stop offset="1" stop-color="#99ecff"/></linearGradient><path fill="url(#SrYuS0MYDGH9m0SRC6_noc)" d="M15.211,11h33.578c3.024,0,5.356,2.663,4.956,5.661l-4.667,35 C48.747,54.145,46.628,56,44.122,56H19.878c-2.506,0-4.625-1.855-4.956-4.339l-4.667-35C9.855,13.663,12.187,11,15.211,11z"/><linearGradient id="SrYuS0MYDGH9m0SRC6_nod" x1="32" x2="32" y1="46" y2="56" gradientTransform="matrix(1 0 0 -1 0 64)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#41bfec"/><stop offset=".232" stop-color="#4cc5ef"/><stop offset=".644" stop-color="#6bd4f6"/><stop offset="1" stop-color="#8ae4fd"/></linearGradient><path fill="url(#SrYuS0MYDGH9m0SRC6_nod)" d="M53,18H11c-1.105,0-2-0.895-2-2v-6c0-1.105,0.895-2,2-2h42c1.105,0,2,0.895,2,2v6 C55,17.105,54.105,18,53,18z"/></g><g><linearGradient id="SrYuS0MYDGH9m0SRC6_noe" x1="52" x2="52" y1="-1064" y2="-1088" gradientTransform="translate(0 1128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ff5840"/><stop offset=".007" stop-color="#ff5840"/><stop offset=".989" stop-color="#fa528c"/><stop offset="1" stop-color="#fa528c"/></linearGradient><path fill="url(#SrYuS0MYDGH9m0SRC6_noe)" d="M52,40c-6.627,0-12,5.373-12,12s5.373,12,12,12s12-5.373,12-12S58.627,40,52,40z"/><path fill="#fff" d="M57.417,49.412l-8.005,8.005c-0.778,0.778-2.051,0.778-2.828,0l0,0 c-0.778-0.778-0.778-2.051,0-2.828l8.005-8.005c0.778-0.778,2.051-0.778,2.828,0l0,0C58.194,47.361,58.194,48.634,57.417,49.412z"/><path fill="#fff" d="M46.583,49.412l8.005,8.005c0.778,0.778,2.051,0.778,2.828,0l0,0c0.778-0.778,0.778-2.051,0-2.828 l-8.005-8.005c-0.778-0.778-2.051-0.778-2.828,0l0,0C45.806,47.361,45.806,48.634,46.583,49.412z"/></g></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Polaris-Card" >
                                    <div class="Polaris-Card__Section">
                                        <div class="Polaris-DataTable">
                                            <div class="Polaris-DataTable__ScrollContainer">
                                                <table class="Polaris-DataTable__Table">
                                                    <?php if($duplicate_products){ ?>
                                                    <thead>
                                                        
                                                        <tr>
                                                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignMiddle Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header Polaris-DataTable__Cell--total" scope="col"></th>
                                                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignMiddle Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header Polaris-DataTable__Cell--total" scope="col">Duplicate Products</th>
                                                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignMiddle Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric Polaris-DataTable__Cell--total" scope="col">Created</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            foreach($duplicate_products as $product){ 
                                                                $fff = time_elapsed_string($row['iana_timezone'], $product['created_at'], $full = false);
                                                        ?>
                                                                <tr class="Polaris-DataTable__TableRow Polaris-DataTable--hoverable">
                                                                    <td style="text-align: center;" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignMiddle" scope="row"><span class="Polaris-Thumbnail Polaris-Thumbnail--sizeSmall"><img src="<?php echo $product['image']['src']; ?>" alt=""></span></td>
                                                                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignMiddle Polaris-DataTable__Cell--firstColumn" scope="row"><?php echo $product['title']; ?></td>
                                                                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignMiddle Polaris-DataTable__Cell--numeric" scope="row"><?php echo  $fff; ?></td>
                                                                </tr>
                                                        <?php 
                                                            }
                                                        ?>
                                                    </tbody>
                                                    <?php }else{ ?>
                                                        <tr class="Polaris-DataTable__TableRow Polaris-DataTable--hoverable">
                                                            <td style="text-align: center;" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignMiddle" scope="row">No Products to delete.</td>
                                                        </tr>
                                                    <?php }  ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Polaris-Card sd-Ad-Box">
                                    <div class="Polaris-Card__Header">
                                        <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                                            <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                                <h2 class="Polaris-Heading">Our Other Apps</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Polaris-Card__Section">
                                        <div id="sd-other-apps">
                                            <div>
                                                <div class="grid__item grid__item--tablet-up-half grid__item--desktop-up-quarter grid-item--app-card-listing">
                                                    <a target="_blank" title="Go to Advanced Wholesale Pro" href="https://apps.shopify.com/advanced-wholesale-pro">
                                                        <div class="ui-app-card" title="Go to Advanced Wholesale Pro" data-target-href="https://apps.shopify.com/advanced-wholesale-pro">
                                                            <div class="ui-app-card__icon-container"><img class="ui-app-card__icon" height="72" width="72" alt="" src="https://secure.gatewaypreorder.com/preorder/assets/img/advanced-wholesale.png"></div>
                                                            <div class="ui-app-card__details">
                                                                <h4 class="ui-app-card__name">Advanced Wholesale Pro</h4>
                                                                <div class="ui-app-card__context">
                                                                    <div class="ui-app-card__pricing">
                                                                        <div class="ui-app-pricing ui-app-pricing--format-short">Free plan available</div>
                                                                    </div>
                                                                </div>
                                                                <p class="ui-app-card__description">Wholesale, Apply Quantity Breaks &amp; Discounts in a Flash</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="grid__item grid__item--tablet-up-half grid__item--desktop-up-quarter grid-item--app-card-listing">
                                                    <a target="_blank" title="Go to My mini cart" href="https://apps.shopify.com/my-mini-cart">
                                                        <div class="ui-app-card" title="Go to My mini cart" data-target-href="https://apps.shopify.com/my-mini-cart">
                                                            <div class="ui-app-card__icon-container"><img class="ui-app-card__icon" height="72" width="72" alt="" src="https://secure.gatewaypreorder.com/preorder/assets/img/my-mini-cart.png"></div>
                                                            <div class="ui-app-card__details">
                                                                <h4 class="ui-app-card__name">My mini cart</h4>
                                                                <div class="ui-app-card__context">
                                                                    <div class="ui-app-card__pricing">
                                                                        <div class="ui-app-pricing ui-app-pricing--format-short">3-day free trial</div>
                                                                    </div>
                                                                </div>
                                                                <p class="ui-app-card__description">Get customized Floating or Dropdown cart</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="grid__item grid__item--tablet-up-half grid__item--desktop-up-quarter grid-item--app-card-listing">
                                                    <a target="_blank" title="Go to Predictive Search 2.0" href="https://apps.shopify.com/predictive-search">
                                                        <div class="ui-app-card" title="Go to Predictive Search 2.0" data-target-href="https://apps.shopify.com/predictive-search">
                                                            <div class="ui-app-card__icon-container"><img class="ui-app-card__icon" height="72" width="72" alt="" src="https://secure.gatewaypreorder.com/preorder/assets/img/predective.png"></div>
                                                            <div class="ui-app-card__details">
                                                                <h4 class="ui-app-card__name">Predictive Search 2.0</h4>
                                                                <div class="ui-app-card__context">
                                                                    <div class="ui-app-card__pricing">
                                                                        <div class="ui-app-pricing ui-app-pricing--format-short">7-day free trial</div>
                                                                    </div>
                                                                </div>
                                                                <p class="ui-app-card__description">By typing 2 characters, will show you all related products</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="grid__item grid__item--tablet-up-half grid__item--desktop-up-quarter grid-item--app-card-listing">
                                                    <a target="_blank" title="Go to Advanced GST 2.0" href="https://apps.shopify.com/advanced-gst">
                                                        <div class="ui-app-card" title="Go to Advanced GST 2.0" data-target-href="https://apps.shopify.com/advanced-gst">
                                                            <div class="ui-app-card__icon-container"><img class="ui-app-card__icon" height="72" width="72" alt="" src="https://secure.gatewaypreorder.com/preorder/assets/img/advance-gst.png"></div>
                                                            <div class="ui-app-card__details">
                                                                <h4 class="ui-app-card__name">Advanced Invoices/GST</h4>
                                                                <div class="ui-app-card__context">
                                                                    <div class="ui-app-card__pricing">
                                                                        <div class="ui-app-pricing ui-app-pricing--format-short">Free plan available</div>
                                                                    </div>
                                                                </div>
                                                                <p class="ui-app-card__description">Get GST ready invoices, Generate GST Reports, Set HSN Codes</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="PolarisPortalsContainer">
                <div data-portal-id="popover-Polarisportal3"></div>
                <div data-portal-id="modal-Polarisportal1">
                    <div></div>
                </div>
                <div data-portal-id="Polarisportal2">
                    <div class="Polaris-Frame-ToastManager" aria-live="assertive"></div>
                </div>
            </div>
        </div>
    </div>

<?php

function time_elapsed_string($zone, $datetime, $full = false) {
    date_default_timezone_set($zone);
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>
<?php include("footer.php"); ?>





