
<?php  foreach ($listTasks as $task):  ?>

<section class="taskInfo">
	<section class="task">
		<input id="taskNum_<?=$task['id']?>"  type="checkbox">
		<label for="taskNum_<?=$task['id']?>"><?=$task['text_task']?></label>
	</section>
	<span class="timeTask">
		<time>
			<?php
			$dateTime = new DateTime($task['date_task']);
			echo $dateTime->format('H:i');

			?>

		</time> <i><?php

			echo $dateTime->format('A');

			?></i>
	</span>

</section>

<?php endforeach;?>