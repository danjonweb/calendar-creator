<section class="section">
  
  <div class="container mb-4">
    <div class="field">
      <label class="label is-medium">Event Date<i id="indicator" class="fas fa-circle htmx-indicator is-pulled-right has-text-warning"></i></label>
      <div class="control">
        <input name="date" class="input is-medium" type="date" value="<?php echo $model->getDate(); ?>" placeholder="Event Date" hx-indicator="#indicator" hx-trigger="input delay:500ms" hx-get="<?php echo ROOT_URL; ?>/" hx-params="*" hx-push-url="true" hx-target="body">
      </div>
    </div>
  </div>
  
  <div class="container mb-4">
    <?php if ($model->getNumEvents() > 0) : ?>
    <table class="table is-fullwidth">
      <thead>
        <tr>
          <th>Events (markdown)</th>
          <th>Preview</th>
          <th style="width:20px;"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $Parsedown = new Parsedown();
        foreach ($model->getEvents() as $event) {
          echo '<tr>';
          echo '<td>';
          echo '<textarea name="content" hx-post="'.ROOT_URL.'/ajax/update/'.$event->getID().'" hx-trigger="input delay:500ms" hx-target="#preview-'.$event->getID().'">' . $event->getContent() . '</textarea>';
          echo '</td>';
          echo '<td><div id="preview-'.$event->getID().'" class="preview">' . $Parsedown->text($event->getContent()) . '</div></td>';
          echo '<td><form><i class="far fa-trash-alt has-text-danger" hx-post hx-target="body" hx-indicator="#indicator"></i><input type="hidden" name="delete"><input type="hidden" name="id" value="'.$event->getID().'"></form></td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
    <?php else : ?>
    <div class="has-text-centered">
      <i class="far fa-calendar-minus"></i> No events found
    </div>
    <?php endif; ?>
  </div>
  
  <div class="container is-flex is-justify-content-end">
    <form>
      <input type="hidden" name="add">
      <button class="button is-success" hx-post hx-target="body" hx-indicator="#indicator">Add Event</button>
    </form>
  </div>
  

</section>
