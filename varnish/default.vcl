vcl 4.1;

backend default {
    .host = "web";
    .port = "80";
}

sub vcl_recv {
    return (hash);
}

sub vcl_backend_response {
    set beresp.ttl = 60s;
}
