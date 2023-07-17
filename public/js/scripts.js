function createAlertContainer(messages, type) {
  const container = $('<div>').addClass(`alert alert-${type} alert-dismissible fade show`);

  if (Array.isArray(messages)) {
    const content = messages.length === 1 ? messages[0] : messages.join('<br>');
    container.append($('<span>').html(content));
  } else {
    container.append($('<span>').text(messages));
  }

  container.append(
    $('<button>')
      .addClass('close')
      .attr({
        type: 'button',
        'data-dismiss': 'alert',
        'aria-label': 'Close',
      })
      .append($('<span>').attr('aria-hidden', 'true').html('&times;'))
  );

  // Delay the display of the alert container for 5 seconds
  setTimeout(function() {
    container.alert('close'); // Close the alert container
  }, 10000);

  return container;
}
