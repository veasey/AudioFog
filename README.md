# AudioFog

Share and play audio files for free.

## Future Features

- fix prev and next btns
- Additional Track Info
  - share / embed button
  - download utton
- generate album art based off keywords and title
- visualisation
- filter by albums and years as well as tags
- Artist / uploader Profiles
- Search
- Sort by Most and Least played
- sort by Track Length
- Default sort: Age
- being able to upload multiple files as an album
- being able to delete an album
- album edit form
  - change song order
  - cover art

- design
  - player in footer bar on bottom, all inline

- test on firefox (as does not support mp3?)

## Troubleshooting

### File Storage
- Have you created symlink?
- Have you added `http {
      client_max_body_size 20M;         
}` to `/etc/nginx/nginx.conf`
