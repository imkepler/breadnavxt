add_filter('bcn_breadcrumb_template', 'custom_breadcrumb_template_swap', 3, 10);
function custom_breadcrumb_template_swap($template, $type, $id)
{
//If we didn't get a good template, use a default template
		if($template == null)
		{
			return sprintf('<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="%1$s" href="%%link%%" class="%%type%%" bcn-aria-current><span property="name">%%htitle%%</span></a><meta property="position" content="%%position%%"></span>', esc_attr__('%title%','breadcrumb-navxt'));
		}
		//If something was passed in template wise, update the appropriate internal template
		else
		{
			if($linked)
			{
				return $template;
			}
			else
			{
				return sprintf('<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="%1$s" href="%%link%%" class="%%type%%" bcn-aria-current><span property="name">%%htitle%%</span></a><meta property="position" content="%%position%%"></span>', esc_attr__('%title%','breadcrumb-navxt'));
			}
		}
}

add_filter('bcn_breadcrumb_title', 'custom_breadcrumb_title_swap',3, 10);
function custom_breadcrumb_title_swap($title, $type, $id)
{
 if(in_array('home', $type))
    {
        $title = __('Home');
    }
    return $title;
}