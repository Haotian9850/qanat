
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Copyright @ 2019 Qanat Team</span>
        </div>
    </footer>
    </body>
   <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../resources/scripts/toggle.js"></script>
    <script src="../resources/scripts/export.js"></script>
    <script>
        const stations = <?php echo json_encode($stations); ?>;
    </script>
    <script src="../resources/scripts/map.js"></script>
  </body>
</html>