using UnityEngine;
using UnityEditor;
using System.Collections;

[CustomEditor(typeof(grid))]

public class GridEditor : Editor
{

	public override void OnInspectorGUI()
	{
		DrawDefaultInspector ();

		grid myGrid = (grid)target;

		GUILayout.BeginHorizontal ();
		if (GUILayout.Button ("ALIGN", GUILayout.Width (70))) {
			Debug.Log ("PEPE");

			// Por cada hijo del objeto que tiene este Script
			for (int i = 0; i < myGrid.transform.childCount; i++) {
				// Seteamos su posicion a (0.5, 0.5)
				Transform child_transf = myGrid.transform.GetChild (i);
				child_transf.position = new Vector3 ((int)child_transf.position.x + 0.5f,
					(int) child_transf.position.y + 0.5f,
					child_transf.position.z);
			}
		}

		GUILayout.EndHorizontal ();
		if (GUILayout.Button ("ALIGN2", GUILayout.Width (70))) {
			Debug.Log ("PEPE");
		}
		//GUILayout.EndHorizontal ();

	
	}
}
