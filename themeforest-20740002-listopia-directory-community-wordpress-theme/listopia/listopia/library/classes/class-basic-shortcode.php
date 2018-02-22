<?php

class jvbpd_basic_shortcode {

	Const STR_SHORTCODE_FORMAT = 'jvbpd_';

	public static $instance = null;
	public $is_logged = false;
	public $shortcodes = Array();

	public function __construct() {
		$this->setVariables();
		$this->registerHooks();
	}

	public function setVariables() {
		$this->is_logged = is_user_logged_in();
	}

	public function registerHooks() {
		add_action( 'init', Array( $this, 'initialize' ) );
	}

	public function initialize() {
		add_filter( 'jvbpd_other_shortcode_array', Array( $this, 'createShortcode' ) );
		$this->addBasicScodes();
	}

	public function addBasicScodes() {
		$this->add( 'jvbpd_mypage_button', Array( $this, 'mypage_button' ) );
		$this->add( 'jvbpd_submit_button', Array( $this, 'submit_button' ) );
		$this->add( 'jvbpd_join_button', Array( $this, 'join_button' ) );
		$this->add( 'jvbpd_join_form', Array( $this, 'join_form' ) );
	}

	public function add( $scodeName='', $func=Array() ){
		$this->shortcodes[ $scodeName ] = $func;
	}

	public function createShortcode( $shortcodes=Array() ) {
		$this->shortcodes = (array) apply_filters( 'jvbpd_basic_shortcode_array', $this->shortcodes );
		return wp_parse_args( $this->shortcodes, $shortcodes );
	}



	public function mypage_button( $atts, $content='' ) {

		$options = shortcode_atts(
			Array(
				'before' => esc_html__( "Login", 'listopia' ),
				'after' => esc_html__( "My Page", 'listopia' ),
			), $atts
		);
		return $this->createLinkButton(
			Array(
				'label' => !$this->is_logged ? $options[ 'before' ] : $options[ 'after' ],
				'modal' => !$this->is_logged ? '#login_panel' : false,
				'link' => !$this->is_logged ? 'javascript:' : jvbpd_getCurrentUserPage()
			)
		);
	}

	public function submit_button( $atts, $content='' ){

		return '';

		$options = shortcode_atts(
			Array(
				'before' => esc_html__( "Login", 'listopia' ),
				'after' => esc_html__( "Submit", 'listopia' ),
			), $atts
		);

		return $this->createLinkButton(
			Array(
				'label' => !$this->is_logged ? $options[ 'before' ] : $options[ 'after' ],
				'modal' => !$this->is_logged ? '#login_panel' : false,
				'link' => !$this->is_logged ? 'javascript:' : jvbpd_getCurrentUserPage( $strSlug )
			)
		);
	}

	public function join_button( $atts, $content='' ){
		$options = shortcode_atts(
			Array(
				'before' => esc_html__( "Register", 'listopia' ),
				'after' => esc_html__( "Submit", 'listopia' ),
			), $atts
		);
		return $this->createLinkButton(
			Array(
				'label' => !$this->is_logged ? $options[ 'before' ] : $options[ 'after' ],
				'class' => !$this->is_logged ? false : 'hidden',
				'modal' => !$this->is_logged ? '#register_panel' : false,
			)
		);
	}

	public function createLinkButton( $args=Array() ) {

		$args = shortcode_atts(
			Array(
				'button' => true,
				'class' => false,
				'label' => esc_html__( "Login", 'listopia' ),
				'link' => '',
				'modal' => false,
			), $args
		);

		$classes = $append = Array();

		$classes[] = $args[ 'button' ] ? 'btn btn-primary' : false;

		if( $args[ 'class' ] )
			$classes[] = $args[ 'class' ];

		if( $args[ 'modal' ] ) {
			$append[] = 'data-toggle="modal"';
			$append[] = sprintf( 'data-target="%s"', $args[ 'modal' ] );
		}

		return sprintf(
			'<a href="%1$s" class="%2$s" %3$s>%4$s</a>',
			$args[ 'link' ],
			join( ' ', $classes ),
			join( ' ', $append ),
			$args[ 'label' ]
		);
	}

	public function join_form( $args, $content='' ) {
		$options = shortcode_atts(
			Array(
				'close_button' => false,
			), $args
		);

		return $this->createJoinForm( $options );
	}

	public function createJoinForm( $options=Array() ) {
		ob_start();
			?>
			<form data-javo-modal-register-form>

				<div class="modal-body">
					<?php do_action( 'jvbpd_register_form_before' ); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="" for="reg-username"><?php esc_html_e('Username', 'listopia' );?></label>
								<input type="text" id="reg-username" name="user_login" class="form-control" required="" placeholder="<?php esc_attr_e( 'Username', 'listopia' );?>">
							</div>
						</div><!-- /.col-md-6 -->
						<div class="col-md-6">
							<div class="form-group">
								<label class="" for="reg-email"><?php esc_html_e('Email Address', 'listopia' );?></label>
								<input type="text" id="reg-email" name="user_email" class="form-control" required="" placeholder="<?php esc_attr_e( 'Your email', 'listopia' );?>">
							</div>
						</div><!-- /.col-md-6 -->
					</div><!-- /.row -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="" for="firstname"><?php esc_html_e('First Name', 'listopia' );?></label>
								<input type="text" id="firstname" name="first_name" class="form-control" required="" placeholder="<?php esc_attr_e( 'Your first name', 'listopia' );?>">

							</div>
						</div><!-- /.col-md-6 -->
						<div class="col-md-6">
							<div class="form-group">
								<label class="" for="lastname"><?php esc_html_e('Last Name', 'listopia' );?></label>
								<input type="text" id="lastname" name="last_name" class="form-control" required="" placeholder="<?php esc_attr_e( 'Your last name', 'listopia' );?>">

							</div>
						</div><!-- /.col-md-6 -->
					</div><!-- /.row -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="" for="reg-password"><?php esc_html_e('Password', 'listopia' );?></label>
								<input type="password" id="reg-password" name="user_pass" class="form-control" required="" placeholder="<?php esc_attr_e( 'Desired Password', 'listopia' );?>">

							</div>
						</div><!-- /.col-md-6 -->
						<div class="col-md-6">
							<div class="form-group">
								<label class="" for="reg-con-password"><?php esc_html_e('Confirm Password', 'listopia' );?></label>
								<input type="password" id="reg-con-password" name="user_con_pass" class="form-control" required="" placeholder="<?php esc_attr_e( 'Confirm Password', 'listopia' );?>">

							</div>
						</div><!-- /.col-md-6 -->
					</div><!-- /.row -->
					<?php do_action( 'jvbpd_register_form_after' ); ?>
				</div>

				<div class="modal-footer">

					<?php
					if( $agree_page = jvbpd_tso()->get( 'agree_register', 0 ) )
					{
						echo "<div class=\"row\">";
							echo "<div class=\"col-md-12\">";
								echo "<div class=\"checkbox\">";
									echo "<label>";
										echo "<input type=\"checkbox\" class=\"javo-register-agree\">";
										printf(
											"<a href=\"%s\" target='_blank'>%s</a>"
											, apply_filters( 'jvbpd_wpml_link', $agree_page )
											, esc_html__( "I agree with the terms and conditions.", 'listopia' )
										);
									echo "</label>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
					} ?>

					<div class="row">
						<div class="col-md-8 text-right">
							<input type="hidden" name="action" value="register_login_add_user">
							<button type="submit" id="signup" name="submit" class="btn btn-primary"><?php esc_html_e('Create My Account', 'listopia' );?></button> &nbsp;
							<?php
							if( $options[ 'close_button' ] )
								printf( '<button type="button" class="btn btn-default" data-dismiss="modal">%1$s</button>', esc_html__('Close', 'listopia' ) );
							?>
						</div><!-- /.col-md-8 -->
					</div><!-- /.row -->
				</div>
			</form>
		<?php
		return ob_get_clean();
	}


	public static function getInstance(){
		if( is_null( self::$instance ) )
			self::$instance = new self;
		return self::$instance;
	}
}

if( !function_exists( 'jvbpd_basic_scode' ) ) : function jvbpd_basic_scode(){
	return jvbpd_basic_shortcode::getInstance();
} jvbpd_basic_scode(); endif;