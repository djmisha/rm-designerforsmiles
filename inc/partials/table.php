
<!-- Table Repeater -->
<?php if(have_rows('tables')): ?>

  <?php while(have_rows('tables')): the_row(); ?>

    <h2><?php the_sub_field('table_heading'); ?></h2>
    <?php $table = get_sub_field( 'table' ); ?>
    <?php   if ( $table ): ?>

      <table border="0" class="services_chart_Table">
        <?php if ( $table['header'] ): ?>

          <thead>
            <tr>
              <?php foreach ( $table['header'] as $th ): ?>
                <th class="services_chart__table_heading">
                  <?php echo $th['c']; ?>
                </th>
              <?php endforeach; ?>
            </tr>
          </thead>
        <?php endif; ?>

        <tbody>

          <?php foreach ( $table['body'] as $tr ): ?>
            <tr class="services_chart__table_row">
              <? $count = 0;?>
              <?php foreach ( $tr as $td ): ?>
                <td data-title="<? echo $table['header'][$count]['c'];?>" class="services_chart__table_price_<? echo $table['header'][$count]['c'];?>">
                  <div class="services_chart__table_prices"><?php echo $td['c'];?></div>
                </td>
                <? $count++;?>
              <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>

        </tbody>

      </table>
    <?php endif; ?>

  <?php endwhile; ?>

<?php endif; ?>

