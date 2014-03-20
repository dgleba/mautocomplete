<?php
class conf_ApplicationDelegate {
    function getPermissions(&$record) {
        $auth = & Dataface_AuthenticationTool::getInstance();
        $user = & $auth->getLoggedInUser();
        if (!isset($user))
            return Dataface_PermissionsTool::NO_ACCESS();
        $role = $user->val('Role');
        return Dataface_PermissionsTool::getRolePermissions($role);
    }
}
