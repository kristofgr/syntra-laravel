# Authenticating requests

To authenticate requests, include a **`X-XSRF-TOKEN`** header with the value **`"{YOUR_X_XSRF_TOKEN}"`**.

All authenticated endpoints are marked with a `requires authentication` badge in the documentation below.

You can retrieve your token by <b><a href="\login" target="_blank">logging in</a></b> with valid credentials, the XSRF-TOKEN will be present in the response header.
