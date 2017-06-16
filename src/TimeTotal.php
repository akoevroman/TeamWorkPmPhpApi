<?php namespace TeamWorkPm;

class TimeTotal extends Model
{
    protected function init()
    {
        $this->fields = [
            "company" => [
            "name" => false,
            "id" => false
          ],
          "name" => false,
          "tasklist" => [
            "name" => false,
            "task" => [
                    "time-estimates" => [
                    "total-hours-estimated" => false,
                    "active-mins-estimated" => false,
                    "total-mins-estimated" => false,
                    "active-hours-estimated" => false,
                    "completed-hours-estimated" => false,
                    "completed-mins-estimated" => false
                ],
              "name" => false,
              "id" => false,
              "time-totals" => [
                    "total-mins-sum" => false,
                    "non-billed-mins-sum" => false,
                    "non-billable-hours-sum" => false,
                    "total-hours-sum" => false,
                    "billed-mins-sum" => false,
                    "billed-hours-sum" => false,
                    "billable-hours-sum" => false,
                    "non-billable-mins-sum" => false,
                    "non-billed-hours-sum" => false,
                    "billable-mins-sum" => false
              ]
            ],
            "id" => false
          ]
        ];
        $this->action = 'total';
        //$this->action = 'time_entries';
    }


    /**
     * Retrieve all To-do Item Times
     *
     * GET /task/#{todo_item_id}/time_entries
     *
     * Retrieves all of the time entries from a submitted todo item.
     *
     * @param int $id
     * @param array $params
     * @return TeamWorkPm\Response\Model
     */
    public function getByTask($task_id, array $params = [])
    {
        $task_id = (int) $task_id;
        if ($task_id <= 0) {
            throw new Exception('Invalid param task_id');
        }
        return $this->rest->get("tasks/$task_id/time/$this->action", $params);
    }

    public function getByProject(array $params = [])
    {
        return $this->rest->get("projects/time/$this->action", $params);
    }
}
