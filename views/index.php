%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    <h2>How to use this starter</h2>
    <p>This application can be used as a starting point for any
    assignment in WEBD 236 that requires the non-object oriented
    model-view-controller architecture. It is configured with the
    framework, an empty database, and some tools. Here are some ways
    you can use this starter.
      <ul>
        <li>Several application level constants are available in <code>include/config.php</code> file. </li>
        <li>To work with the database, edit the <code>{{CONFIG['databaseFile'] . ".sql"}}</code> file
        in the root of the project to create tables, add starter
        data, etc. Then under the "Tools" menu, click "DB Reset."
        This will reload the database from the SQL file by running the
        <code>post_index()</code> method in 
        <code>controllers/ResetController.php</code>.</li>
        <li>Remember that a URL like <a href='@@say/hello@@'>
          <code>say/hello</code></a> will
          look for <code>controllers/SayController.php</code> and invoke the
          method <code>get_hello()</code> (or <code>post_hello()</code>
          depending on the HTTP method).</li>
      </ul>
    </ul>
    </p>
  </div>
</div>
  
%% views/footer.html %% 