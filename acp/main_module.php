<?php
/**
*
* @package phpBB Extension - martin externallinkinnewwindow
* @copyright (c) 2014 Martin ( https://github.com/Martin-G- )
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace martin\externallinkinnewwindow\acp;

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		$user->add_lang('acp/common');
		$this->tpl_name = 'externallinkinnewwindow_body';
		$this->page_title = $user->lang('ACP_EXTLINKNEWWIN_TITLE');
		add_form_key('martin/externallinkinnewwindow');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('martin/externallinkinnewwindow'))
			{
				trigger_error('FORM_INVALID');
			}

			$config->set('martin_extlinknewwin_enable_ucp', $request->variable('martin_extlinknewwin_enable_ucp', 0));
			$config->set('martin_extlinknewwin_enable_user', $request->variable('martin_extlinknewwin_enable_user', 0));
			$config->set('martin_extlinknewwin_enable_guests', $request->variable('martin_extlinknewwin_enable_guests', 0));
			$config->set('martin_extlinknewwin_enable_bots', $request->variable('martin_extlinknewwin_enable_bots', 0));
			$config->set('martin_extlinknewwin_add_ref', $request->variable('martin_extlinknewwin_add_ref', 0));

			trigger_error($user->lang('ACP_EXTLINKNEWWIN_SETTINGS_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'U_ACTION'						=> $this->u_action,
			'MARTIN_EXTLINKNEWWIN_UCP'		=> $config['martin_extlinknewwin_enable_ucp'],
			'MARTIN_EXTLINKNEWWIN_USER'		=> $config['martin_extlinknewwin_enable_user'],
			'MARTIN_EXTLINKNEWWIN_GUESTS'	=> $config['martin_extlinknewwin_enable_guests'],
			'MARTIN_EXTLINKNEWWIN_BOTS'		=> $config['martin_extlinknewwin_enable_bots'],
			'MARTIN_EXTLINKNEWWIN_ADDREF'	=> $config['martin_extlinknewwin_add_ref'],
		));
	}
}
