 using UnityEngine;
using System.Collections;

public class PacMan_Script : MonoBehaviour {

	public GameManager gameManager;

    public float Speed = 5.0f;

	public PacManState pacManState = PacManState.Normal;
	public float initPowerUpTime = 5.0f;
	public float powerUpTime = 0.0f;

    grid gridReference;

    Vector3 finalPosition;

	Vector3 target_position;

	Vector3 left_border = new Vector3 (0.5f, 18.5f, 0);

	bool start = false;

	public Direction direction = Direction.Stop;

	public bool goingLeftMargin = false;
	public bool leftDisappear = false;
	public bool goingRightMargin = false;
	public bool rightDisappear = false;
	public float goingMarginTime = 0.1f;

    // Use this for initialization
    void Start () {
        gridReference = FindObjectOfType<grid>();
		target_position = this.transform.position; 
		powerUpTime = initPowerUpTime;
	}
	
	// Update is called once per frame
	void Update () {

		if (gameManager.gameState == GameState.Playing) {

			if (!goingLeftMargin) {
				if ((Input.GetKey (KeyCode.RightArrow) || Input.GetKey (KeyCode.D))) {
					direction = Direction.Right;
				} else if ((Input.GetKey (KeyCode.LeftArrow) || Input.GetKey (KeyCode.A))) {
					direction = Direction.Left;
				} else if ((Input.GetKey (KeyCode.UpArrow) || Input.GetKey (KeyCode.W))) {
					direction = Direction.Up;
				} else if ((Input.GetKey (KeyCode.DownArrow) || Input.GetKey (KeyCode.S))) {
					direction = Direction.Down;
				} 

				if (direction == Direction.Right && !gridReference.returnNode (this.transform.position.x + 1, this.transform.position.y).isPipe) {
					target_position = gridReference.returnNode (this.transform.position.x + 1, this.transform.position.y).WorldPosition;
				} else if (direction == Direction.Left && !gridReference.returnNode (this.transform.position.x - 1, this.transform.position.y).isPipe) {
					target_position = gridReference.returnNode (this.transform.position.x - 1, this.transform.position.y).WorldPosition;
				} else if (direction == Direction.Up && !gridReference.returnNode (this.transform.position.x, this.transform.position.y + 1).isPipe) {
					target_position = gridReference.returnNode (this.transform.position.x, this.transform.position.y + 1).WorldPosition;
				} else if (direction == Direction.Down && !gridReference.returnNode (this.transform.position.x, this.transform.position.y - 1).isPipe) {
					target_position = gridReference.returnNode (this.transform.position.x, this.transform.position.y - 1).WorldPosition;
				} else if (direction == Direction.Stop) {
					target_position = this.transform.position;
				}

				MovePacman ();


			} else if (goingLeftMargin || goingRightMargin) {

				if (goingLeftMargin) {
					transform.position += Vector3.left * Speed * Time.deltaTime;

					if (leftDisappear) {
						this.transform.position = new Vector3 (27.5f, 18.5f, this.transform.position.z);
						goingLeftMargin = false;
						leftDisappear = false;
					}

				} else if (goingRightMargin) {
					transform.position += Vector3.right * Speed * Time.deltaTime;

					if (rightDisappear) {
						this.transform.position = new Vector3 (0.5f, 18.5f, this.transform.position.z);
						goingRightMargin = false;
						rightDisappear = false;
					}
				}
			}
		}
	}
		
	void MovePacman()
    {
		
		transform.position = Vector3.MoveTowards(this.transform.position, target_position, Speed * Time.deltaTime);
    }
		
}

public enum Direction 
{
	Right, Left, Up, Down, Stop
}

public enum PacManState 
{
	Normal, PowerUp
}
