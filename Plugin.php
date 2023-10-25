<?php

namespace Kanboard\Plugin\NoClickBoard;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        // hook in onStartup
        // there we can get the user role
    }

    public function onStartup()
    {
        $request = $this->request;
        if ($request->getStringParam('controller') != 'BoardViewController') {
            return;
        }

        $projectId = $request->getIntegerParam('project_id');
        if ($projectId != 0) {
            $userId = $this->userSession->getId();
            $userRole = $this->projectUserRoleModel->getUserRole($projectId, $userId);

            if ($userRole == "NoClick") {
                $this->hook->on('template:layout:js', array('template' => 'plugins/NoClickBoard/Assets/js/NoClickBoard.js'));
            }
        }
    }

    public function getPluginName()
    {
        return "NoClickBoard";
    }

    public function getPluginAuthor()
    {
        return 'Tomas Dittmann';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginDescription()
    {
        return 'Stop clicks on tasks in the Boardview to open to the task details';
    }
}
